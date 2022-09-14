<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sample</title>
</head>

<body>
    original (DB) :<p> {{ $ori }} (UNIX_TIME)</p>
    <hr>
    carbon (BACKEND) :<p> {{ $carbon }} (DATE TIME UTC)</p>
    <hr>
    local (FRONTEND) :
    <p id="local"></p>
</body>

</html>
<script>
    function local() {
        var epoch = {!! json_encode($ori, JSON_HEX_TAG) !!};
        var d = new Date(epoch*1000);  //Convert UTC ke Lokal Date Time

        // date =
        // d.getDate() + '/' +
        // ("00" + (d.getMonth() + 1)).slice(-2) + '/' +
        // d.getFullYear() + ' ' +
        // ("00" + d.getHours()).slice(-2) + ':' +
        // ("00" + d.getMinutes()).slice(-2) + ':' +
        // ("00" + d.getSeconds()).slice(-2);

        //Output: dd/mm/yyyy Hh:mm:ss

        date =
        d.getFullYear() + '-' +
        ("00" + (d.getMonth() + 1)).slice(-2) + '-' +
        d.getDate() + ' ' +
        ("00" + d.getHours()).slice(-2) + ':' +
        ("00" + d.getMinutes()).slice(-2) + ':' +
        ("00" + d.getSeconds()).slice(-2);

        //Output: yyyy/mm/dd Hh:mm:ss
        document.getElementById("local").innerHTML = date+" (LOCAL DATE TIME FORMATTED)"; //Mengikuti zona waktu sistem (local)
    }
    local()
</script>
