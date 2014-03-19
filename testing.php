
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title> - jsFiddle demo</title>
  
  <script type='text/javascript' src='http://code.jquery.com/jquery-1.6.3.js'></script>
  <link rel="stylesheet" type="text/css" href="/css/normalize.css">
  
  
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js"></script>
  
  
  <link rel="stylesheet" type="text/css" href="/css/result-light.css">
  
    
      <link rel="stylesheet" type="text/css" href="http://jquery-ui.googlecode.com/svn/tags/1.8rc3/themes/base/jquery-ui.css">
    
    
  
  <style type='text/css'>
    
  </style>
  


<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
function yesnodialog(button1, button2, element){
  var btns = {};
  btns[button1] = function(){ 
      element.parents('li').hide();
      $(this).dialog("close");
  };
  btns[button2] = function(){ 
      // Do nothing
      $(this).dialog("close");
  };
  $("<div></div>").dialog({
    autoOpen: true,
    title: 'Condition',
    modal:true,
    buttons:btns
  });
}
$('.delete').click(function(){
    yesnodialog('Yes', 'No', $(this));
})
                   
});//]]>  

</script>


</head>
<body>
  <ol id="listItems">
    <li id="listItem-1">
        <span class="title">Item 1</span>
        <span class="delete">delete</span>
    </li>
    <li id="listItem-2">
        <span class="title">Item 2</span>
        <span class="delete">delete</span>
    </li>
    <li id="listItem-3">
        <span class="title">Item 3</span>
        <span class="delete">delete</span>
    </li>
    <li id="listItem-4">
        <span class="title">Item 4</span>
        <span class="delete">delete</span>
    </li>
</ol>
  
</body>


</html>

