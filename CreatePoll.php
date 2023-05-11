<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="Main.css">
    <script type="text/javascript" src="main.js"> </script>

    <title>Create Poll</title>
</head>
<body>
    <section class="section">
        <h1 class="hi">Create Poll</h1>
        <article id="CreatePollForm" >
            <form class="createForm box" id = "CreateForm" action="">
                <label for="question">Question:</label><br>
                <label id="quest_msg" class="err_msg"></label><br>
                <input type="text" id="question" name="question"><br>
                <label for="Answer">Option:</label><br>
                <input type="text" id="ans1" name="ans1"><br>
                <label for="Answer">Option:</label><br>
                <input type="text" id="ans2" name="ans1"><br>
                <label for="Answer">Option:</label><br>
                <input type="text" id="ans3" name="ans1"><br>
                <label for="Answer">Option:</label><br>
                <input type="text" id="ans4" name="ans1"><br>
                <p id="Option"></p>
                <label id="add_option" class="change_accountBtn" > Add </label><br>
               
                <label for="OpenTime">Open Time:</label><br>
                <input type="datetime-local" id="opentime" name="opentime"><br>
                <label for="OpenTime">Close Time:</label><br>
                <input type="datetime-local" id="closetime" name="closetime"><br>
                <input type="submit" class="submitbtn" value="Submit">
                <input  type="submit" id="resetbutton" name= "Reset" value="Reset">
            
            </form>    
        </article>
      
            
        
    </section>

    <script type="text/javascript" src="Validate-CreatePoll.js"> </script>

</body>
</html>