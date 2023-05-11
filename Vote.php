<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="Main.css">
    <script type="text/javascript" src="main.js"> </script>

    <title>Vote</title>
</head>
<body>
    <section class="section">
        <h1 class="hi">Vote</h1>
        <article class="box" id="CreatePollForm" >
            <h3 style="float: left;">By:</h3><br>
            <h3 style="float: left;">ON:</h3><br>

            <h3>The Question will be here</h3><br>
            
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Option 1</label><br>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Option 2</label><br>
            <input type="radio" id="other" name="gender" value="other">
            <label for="other">Option 3</label><br>
            <input type="radio" id="other" name="gender" value="other">
            <label for="other">Option 4</label><br>             
                <input type="submit" class="submitbtn" value="Vote">  
        </article>
      
            
        
    </section>

    <script type="text/javascript" src="Validate-CreatePoll.js"> </script>

</body>
</html>