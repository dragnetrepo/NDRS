import React from "react";
import { Link } from "react-router-dom";

const SendUnionInvite = () => {
  const sampleToken = "ae1c5cf7317e6394f82c2ccba7c5d1c36d76605c";
  return (
    <div>
      <h1>Send Union Invite</h1>
      <Link to={`/union-invite/${sampleToken}`}>View Union Invite</Link>
    </div>
  );
};

export default SendUnionInvite;
