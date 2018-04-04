public function myMax()
	{	$result =$max = $this->arr[0];
		$count = $this->myCount($this->arr);
		for ($i=1; $i< $count;$i++) {
			if ($max < $this->arr[$i])
				{$result = $max;
				$max = $this->arr[$i];
			}# code...
		}
		return $result;
  }
