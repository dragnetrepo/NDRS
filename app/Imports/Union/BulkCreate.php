<?php

namespace App\Imports\Union;

use App\Models\Industry;
use App\Models\Union;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class BulkCreate implements ToCollection
{
    public $response;

    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows): array
    {
        $error_msg = [];
        $this->response =  [
            "data" => [],
            "error" => [],
        ];

        if ($rows->isNotEmpty()) {
            foreach ($rows as $key => $line) {
                if ($key == 0) {
                    if (!isset($line[0]) || (isset($line[0]) && strtolower($line[0]) != "name")) {
                        $error_msg[] = ["First column name must be name"];
                    }

                    if (!isset($line[1]) || (isset($line[1]) && strtolower($line[1]) != "acronym")) {
                        $error_msg[] = ["Second column name must be acronym"];
                    }

                    if (!isset($line[2]) || (isset($line[2]) && strtolower($line[2]) != "industry")) {
                        $error_msg[] = ["Third column name must be industry"];
                    }

                    if (count($error_msg)) {
                        $this->response["error"] = $error_msg;
                    }
                }
                else {
                    if (empty($error_msg)) {
                        $union_name = $line[0] ?? "";
                        $union_acronym = $line[1] ?? "";
                        $union_industry = Industry::where("name", ($line[2] ?? ""))->first();

                        if ($union_name) {
                            $db_union = Union::where("name", $union_name)->first();

                            if (!$db_union) {
                                $db_union = Union::create([
                                    "name" => $union_name,
                                    "acronym" => $union_acronym ?? '',
                                    "founded_in" => "",
                                    "phone" => "",
                                    "headquarters" => "",
                                    "industry_id" => $union_industry->id ?? "",
                                    "description" => "",
                                    "logo" => "",
                                ]);
                            }

                            if ($db_union) {
                                $this->response["data"][] = [
                                    "name" => $db_union->name,
                                    "acronym" => $db_union->acronym,
                                    "industry" => $union_industry->name ?? "",
                                    "date_added" => $db_union->created_at->format("M j Y"),
                                ];
                            }
                        }
                    }
                }
            }
        }
        else {
            $this->response["error"] = ["You have uploaded an empty excel file. Please check and try again"];
        }

        return $this->response;
    }
}
