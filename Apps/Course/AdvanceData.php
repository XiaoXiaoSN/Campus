<?php
	error_reporting(1);
	$url = "http://140.136.251.64/Outlines/student/{$_POST["Link"]}";
	$html = file_get_contents($url);
	// echo "<pre>".$html."</pre>";
	$dom = new DOMDocument;
	libxml_use_internal_errors(true);
        $dom->loadHTML($html);
        $data = $dom->getElementsByTagName("td");
        $result = null;
        foreach ($data as $id => $node) {
//          var_dump($node);
			if( mb_substr(trim($node->nodeValue),0,6) == "課程學習目標" ){
				$result["Goal"] = Util::AutoLink(nl2br(Util::XSS(trim($data->item($id+1)->nodeValue))));
				continue;
			}
			if( mb_substr(trim($node->nodeValue),0,4) == "先修課程" ){
				$result["Preview"] = nl2br(Util::XSS(trim($data->item($id+1)->nodeValue)));
				$result["Preview"] = $result["Preview"]?$result["Preview"]:"無";
	            continue;
			}
			if( mb_substr(trim($node->nodeValue),0,4) == "課程教材" ){
				$result["Material"] = Util::AutoLink(nl2br(Util::XSS(trim($data->item($id+1)->nodeValue))));
				continue;
			}
			if( mb_substr(trim($node->nodeValue),0,4) == "教師背景" ){
				$result["ProfBack"] = trim($data->item($id+1)->nodeValue);
				continue;
			}
			if( mb_substr(trim($node->nodeValue),0,3) == "教科書" ){
				$result["Book"][0] = Util::AutoLink(nl2br(Util::XSS(trim($data->item($id+1)->nodeValue))));
				if(strpos($result["Book"][0], "ISBN")!==false){
					preg_match("/ISBN[ :]+([\d-]+)/", $result["Book"][0], $result["Book"]["ISBN"]);
					$result["Book"]["ISBN"] = $result["Book"]["ISBN"][1];
				}
				continue;
			}
			if( mb_substr(trim($node->nodeValue),0,4) == "參考書目" ){
				$result["Reference"] = Util::AutoLink(nl2br(Util::XSS(trim($data->item($id+1)->nodeValue))));
				continue;
			}
			if( mb_substr(trim($node->nodeValue),0,6) == "教學平台網址" ){
				$result["Site"] = Util::AutoLink(nl2br(Util::XSS(trim($data->item($id+1)->nodeValue))));
				continue;
			}
			if( mb_substr(trim($node->nodeValue),0,4) == "學習規範" ){
				$result["Rule"] = Util::AutoLink(nl2br(Util::XSS(trim($data->item($id+1)->nodeValue))));
				continue;
			}
			if( mb_substr(trim($node->nodeValue),0,4) == "學習評量" ){
				$num = 0;
				for( $i = $id+7; $i < $id+45; $i+=2){
					$result["Eva"][$num][0] = trim($data->item($i)->nodeValue);
					$result["Eva"][$num++][1] = trim($data->item($i+1)->nodeValue);
				}
				continue;
			}
			if( mb_substr(trim($node->nodeValue),0,4) == "教學方法" ){
				$num = 0;
				for( $i = $id+7; $i < $id+49; $i+=2){
					$result["Method"][$num][0] = trim($data->item($i)->nodeValue);
					$result["Method"][$num++][1] = trim($data->item($i+1)->nodeValue);
				}
				continue;
			}
			if( mb_substr(trim($node->nodeValue),0,4) == "授課進度" ){
				$num = 0;
				for( $i = $id+6; $i < $id+(5*18+6); $i+=5){
					$result["Progress"][$num][0] = trim($data->item($i)->nodeValue);
					$result["Progress"][$num][1] = trim($data->item($i+1)->nodeValue);
					$result["Progress"][$num][2] = trim($data->item($i+2)->nodeValue);
					$result["Progress"][$num][3] = trim($data->item($i+3)->nodeValue);
					$result["Progress"][$num++][4] = trim($data->item($i+4)->nodeValue);
				}
				continue;
			}
        }
		return $result;


