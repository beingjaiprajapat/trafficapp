<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signal Lights Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .circle{
            width: 100px;
            height: 100px;
            border-radius:50%;
            background-color:white;
            border: 2px solid black;
            margin: 20px auto
        }
    </style>
</head>
<body>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center">
                    <h1>Signal Lights Control</h1>
                </div>
                <form id="signal-lights-form">
                    @csrf
                    <div class="form-group">
                        <label for="sequence">Sequence:</label>
                        <input type="text" class="form-control" name="sequence" id="sequence" required>
                    </div>
                    <div class="form-group">
                        <label for="green_interval">Green Interval:</label>
                        <input type="number" class="form-control" name="green_interval" id="green_interval" required>
                    </div>
                    <div class="form-group">
                        <label for="yellow_interval">Yellow Interval:</label>
                        <input type="number" class="form-control" name="yellow_interval" id="yellow_interval" required>
                    </div>
                    <button type="button" onclick="sumbitAction();" class="btn btn-primary mt-3">Sumbit</button>
                </form>
                <div class="text-center mt-2">
                        <button type="button" id="start-btn" onclick="startFunc();" class="btn btn-success">Start</button>
                        <button type="button" id="stop-btn" onclick="stop();" class="btn btn-danger">Stop</button>
                </div>
                <div id="signal-lights-output" class="circle"></div>
            </div>
            <div class="col-md-6">
                <h3>Color Meanings:</h3>
                <ul>
                    <li>a/A : Red</li>
                    <li>b/B : Yellow</li>
                    <li>c/C : Orange</li>
                    <li>d/D : Green</li>
                </ul>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
</body>
</html>

<!-- <script src="jquery-3.7.1.min.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>

    function sumbitAction(){
        var sequence = $("#sequence").val();
        var yellow_interval = $("#yellow_interval").val();
        var green_interval = $("#green_interval").val(); 
        
        if(!sequence || !yellow_interval || !green_interval){
            alert("All fileds are required...");
            return;
        }

        var validSequence = /^[A-Da-d](,[a-dA-D])*$/;
        if(!validSequence.test(sequence)){
            alert("Sequence should only coantain a,b,c,d or A,B,C,D letters");
            return;
        }

        green_interval = parseFloat(green_interval);
        yellow_interval = parseFloat(yellow_interval);
      
        if(green_interval <= 0 || yellow_interval <= 0){
            alert("Green and yellow should be postive numbers..");
            return;
        }

        if(!isNaN(sequence)){
            alert("Sequence should not be a number");
            return;
        }
        var formData = $("#signal-lights-form").serialize();
        $.ajax({
            type:'POST',
            url:'/signal-lights/sumbitAction',
            data:formData,
            success:function(response){
                console.log(response);
                alert(response.message);
                $("#sequence").val(" ");
                $("#yellow_interval").val(" ");
                $("#green_interval").val(" ");
            },
            error:function(error){
                console.log(error.error);
            }
        });
    }

    var isRunning = false;
    function startFunc(){
        isRunning = true;
        $.ajax({
            type:'GET',
            url:'/signal-lights/last',
            success:function(response){
                console.log(response);
                if(response.message){
                    alert(response.message);
                    return;
                }

                var sequence = JSON.parse(response.sequence);
                var greenInterval = response.green_interval;
                var yellowInterval = response.yellow_interval;

                function displaySequnce(){
                    var index = 0;
                    var totalInterval = greenInterval + yellowInterval;

                    function displayNextColor(){
                        if(!isRunning){
                            return;
                        }

                        displayColor(sequence[index]);

                        var color = sequence[index];
                        var colorInterval = color === "green" ? greenInterval : (color === 'yellow' ? yellowInterval : 1);
                        index++;

                        if(index >= sequence.length){
                            index = 0;
                        }

                        setTimeout(displayNextColor, colorInterval * 1000);
                    }

                    displayNextColor();
                }

                function displayColor(color){
                    $("#signal-lights-output").css('background-color',color);
                }

                displaySequnce();
                
            },
            error:function(error){
                console.log(error.error);
            }
        })
    }

    $("#stop-btn").click(function(){
        isRunning = false;
        $("#signal-lights-output").css('background-color','white');
    })


    $('#start-btn').click(function(){
        if(!isRunning){
            startFunc();
        }
    })








</script>