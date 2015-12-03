<?php

include '../load.php';

class Vote {

	private $conn = null;

	public function __construct($db) {
		if($this->conn == null) {
			$this->conn = $db;
		}
	}

	public function addVote($entryId, $visitorIp) {
		if(!$this->hasVoted($entryId, $visitorIp)) {
			$this->conn->query("INSERT INTO votes (entry_id, voter_ip) 
								VALUES('$entryId', '$visitorIp')");
		} else {
			// Not so sure about this part.
			echo "
				<script type='text/javascript'>
					alert('You have already voted for that!');
				</script>
			";
		}
	}

	public function hasVoted($entryId, $visitorIp) {
		$check = $this->conn->query("SELECT entry_id FROM votes 
									 WHERE entry_id = '$entryId' 
									 AND voter_ip = '$visitorIp'");
		return $check->num_rows > 0 ? true : false;
	}
}