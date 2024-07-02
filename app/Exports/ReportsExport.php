<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportsExport implements FromCollection, WithHeadings
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $collection = collect([]);
        $collection->push([
            'Current',
            trim($this->data["disputes_approved"]["current"]) ? $this->data["disputes_approved"]["current"] : "0",
            trim($this->data["disputes_satisfaction_score"]["current"]) ? $this->data["disputes_satisfaction_score"]["current"] : "0",
            trim($this->data["document_uploaded"]["current"]) ? $this->data["document_uploaded"]["current"] : "0",
            trim($this->data["disputes_resolved"]["current"]) ? $this->data["disputes_resolved"]["current"] : "0",
            trim($this->data["active_disputes"]["current"]) ? $this->data["active_disputes"]["current"] : "0",
            trim($this->data["avg_dispute_resolution_time"]["current"]) ? $this->data["avg_dispute_resolution_time"]["current"] : "0",
        ]);
        $collection->push([
            'Previous',
            trim($this->data["disputes_approved"]["prev_month"]) ? $this->data["disputes_approved"]["prev_month"] : "0",
            trim($this->data["disputes_satisfaction_score"]["prev_month"]) ? $this->data["disputes_satisfaction_score"]["prev_month"] : "0",
            trim($this->data["document_uploaded"]["prev_month"]) ? $this->data["document_uploaded"]["prev_month"] : "0",
            trim($this->data["disputes_resolved"]["prev_month"]) ? $this->data["disputes_resolved"]["prev_month"] : "0",
            trim($this->data["active_disputes"]["prev_month"]) ? $this->data["active_disputes"]["prev_month"] : "0",
            trim($this->data["avg_dispute_resolution_time"]["prev_month"]) ? $this->data["avg_dispute_resolution_time"]["prev_month"] : "0",
        ]);
        // $collection->push(["Period"]);
        $collection->push(["Top Dispute Types"]);
        foreach ($this->data["top_dispute_types"] as $period => $value) {
            $collection->push([
                $period, ($value ? $value : "0")
            ]);
        }
        $collection->push(["Highest Dispute Cases"]);
        foreach ($this->data["highest_dispute_cases"] as $period => $value) {
            $collection->push([
                $period, ($value ? $value : "0")
            ]);
        }
        $collection->push(["Highest Resolution Rate"]);
        foreach ($this->data["highest_resolution_rate"] as $period => $value) {
            $collection->push([
                $period, ($value ? $value : "0")
            ]);
        }
        return $collection;
    }

    public function headings(): array
    {
        return [
            '#',
            'Disputes Approved',
            'Dispute Satisfaction Score',
            'Document Uploaded',
            'Disputes Resovled',
            'Active Disputes',
            'Avg. Dispute Resolution Time',
        ];
    }
}
