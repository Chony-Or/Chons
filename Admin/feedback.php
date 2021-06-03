<?php include "includes/redirection.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/db_connection.php" ?>

<?php

        //fetch order
        $getFeedback = "Select * From feedback_tbl";
        $feedbacklist = $connection->query($getFeedback); // execute the query to the database 
	    $feedbacklist = $feedbacklist->fetch_all(MYSQLI_ASSOC);
?>

<body> 

    <h4 style="color: black; font-weight: bold">Feedback</h4>
    <h5 style="color: gray; margin-bottom: 20px">Lhoyzki Milkshake & Milktea</h5>
    <hr style="height: 2px; border-width: 0; color: black; background-color: black">

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">FeedBack ID</th>
                <th scope="col">Comments</th>
            </tr> 
        </thead>
        <tbody>
        <?php $counter = 0; ?>
        <?php foreach ($feedbacklist as $key => $feedval):?>
            <tr aria-rowspan="3">
                <th scope="row"><?php echo ++$counter?></th>
                <td><?php echo $feedval['feedback_ID'] ?></td>
                <td><?php echo $feedval['comments']?></td>
            </tr>
        <?php endforeach?>
        </tbody>
    </table>

</body>
<?php include "includes/footer.php" ?>