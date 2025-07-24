<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Doctor Token</title>
  
</head>
<body style="text-align: center; border: 1px solid #000;background-color:aqua;">
        <h5>{{$settings->name}}</h5>
        <h5>Department:{{$queue->service->name}}</h5>
        <p>{{$queue->formated_date}}</p>
        <h5> Token Number:{{$queue->token_number}}</h5>
        <p class="instructions">Please wait for your trun</p>
        <h6 style = "color:red;">Customer waiting : {{$customer_waiting}}</h6>    
</body>
</html>

                             