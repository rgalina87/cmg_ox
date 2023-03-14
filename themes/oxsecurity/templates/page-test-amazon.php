
<?php
/** Template Name: Test Amazon */
?>

<h3>Test Amazon</h3>

<?php
if (count($_POST)) {
    // echo $_POST["fld"];
    echo "<pre>" . print_r($_POST, 1) . "</pre>";
    echo "<script>var fld_val='" . $_POST["fld"] . "'</script>";
} else {
    echo "No post data...";
}
?>

<!-- My form -->
<script charset="utf-8" type="text/javascript" src="//js-eu1.hsforms.net/forms/embed/v2.js"></script>
<script>
  hbspt.forms.create({
    region: "eu1",
    portalId: "26686406",
    formId: "fcf85b81-1414-453b-9441-4caef5dddd57"
  });
</script>

<!-- ox form -->
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
<script>
  hbspt.forms.create({
    region: "na1",
    portalId: "20204725",
    formId: "220c1df7-b242-424f-8c09-b6e9b87279e4"
  });
</script>

<!-- send to self -->
<form action="" method="post">
  <label for="fld">fld:</label>
  <input type="text" id="fld" name="fld"><br><br>
  <input type="submit" value="Send self">
</form>

</script>

<?php
/*
cmg test form https://share-eu1.hsforms.com/1_PhbgRQURTuUQUyu9d3dVwfvzd2
request:
{
"RegistrationToken": "string"
}

amazon response:
{
"CustomerAWSAccountId": "string",
"CustomerIdentifier": "string",
"ProductCode": "string"
}
 */
?>

<script>
  setTimeout(()=>{
    if(fld_val) document.getElementById('test-fcf85b81-1414-453b-9441-4caef5dddd57').value=fld_val;
  },3000)
</script>