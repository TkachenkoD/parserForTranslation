<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Praser</title>
</head>
<body>
    test parser works fine
   <?php  print_r("<br>");?>
    <?php

include_once 'simplehtmldom_1_9/simple_html_dom.php';

$html = str_get_html('
   <footer class="p__footer p-add-new-app__footer">
      <button id="p-create-task-prev" class="btn btn--white" type="button">Back</button>
      <button id="p-create-task-smallstep-1-prev" class="btn btn--white" type="button">Back</button>
      <button id="p-create-task-next" class="btn btn--crimson" type="button">Next</button>
      <button id="p-create-task-smallstep-1-next" class="btn btn--crimson" type="button">Next</button>
      <button id="p-create-task-save" class="btn btn--crimson" type="button">Create appointment</button>
   </footer>
');
$res = $html->find('button');
$testArr = [];
foreach($res as $value){

    $string = strval($value->plaintext);
    // $string = strval($value->innertext);
        $string = preg_replace('~<\S[^<>]*>~', '', $string);
        $cleanedstr = preg_replace(
            "/(\t|\n|\v|\f|\r| |\xC2\x85|\xc2\xa0|\xe1\xa0\x8e|\xe2\x80[\x80-\x8D]|\xe2\x80\xa8|\xe2\x80\xa9|\xe2\x80\xaF|\xe2\x81\x9f|\xe2\x81\xa0|\xe3\x80\x80|\xef\xbb\xbf)+/",
            "",
            $string
        );
    
        $cleanIndexForJSON = str_replace(' ', '', strip_tags($cleanedstr));
    
    $testArr["Test_btn_".$cleanIndexForJSON] = Array('en'=>'en_'.$value->plaintext,'fr'=>'fr_'.$value->plaintext,'de'=>'de_'.$value->plaintext);
    foreach($testArr as $k=>$v){
   
        print_r($value->innertext = "<?php str(\"".$k."\") ?>");
        print_r("<br>");
    
    }

// print_r($value->innertext = "str('".$str."')");
    // echo $html; 
    // print_r($value->innertext = "str('".$k."')");
}


//$html->find('div', 1)->class = 'bar';


// $html->find('div[id=hello]', 0)->innertext = 'foo';

echo $html; // Output: <div id="hello">foo</div><div id="world" class="bar">World</div>

file_put_contents('strPlaintext.php', $html);
// file_put_contents('str.php', $html);
      //echo file_get_html('data/main.php')->plaintext;  


//-------------PARSER starts here----------------------

// $html = file_get_html('data/mainTest.php');
// $testArr = [];
// $res = [];
// // Find all images 
// $res = $html->find('label');
// foreach($res as $element) {
//     // $asd = strval($element->plaintext);
//     $string = strval($element->innertext);
//     $string = preg_replace('~<\S[^<>]*>~', '', $string);
//     $cleanedstr = preg_replace(
//         "/(\t|\n|\v|\f|\r| |\xC2\x85|\xc2\xa0|\xe1\xa0\x8e|\xe2\x80[\x80-\x8D]|\xe2\x80\xa8|\xe2\x80\xa9|\xe2\x80\xaF|\xe2\x81\x9f|\xe2\x81\xa0|\xe3\x80\x80|\xef\xbb\xbf)+/",
//         "",
//         $string
//     );

//     $asd = str_replace(' ', '', strip_tags($cleanedstr));
  
// 	$testArr["TestViev_".$asd."_Asq"] = Array('en'=>$element->plaintext,'fr'=>$element->plaintext,'de'=>$element->plaintext);
//     // $testArr["AppointViev_".$asd."_As"] = Array('en'=>$asd,'fr'=>$asd,'de'=>$asd);
    
	

//     // $element->find('label')->innertext = 'foo';
//     $element->innertext = "str('AppointViev_'.$asd.'_As')";
// }
//        //echo $element->innertext . '<br>';
echo "<pre>";
 print_r($testArr);
echo "</pre>";

// echo json_encode($testArr);

// file_put_contents('test.json', json_encode($testArr), FILE_APPEND);
file_put_contents('testPlaintextLbl.json', json_encode($testArr));

    ?>
    <script>
    console.log('good parser');
    </script>
</body>
</html>
