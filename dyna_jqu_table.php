<?php
include ("dbconnection.php");

if (isset($_POST['save'])) {

    $names = $_POST['name'];
    $contacts = $_POST['contact'];
    $emails = $_POST['email'];

    
    for ($i = 0; $i < count($names); $i++) {
        $name = $names[$i];
        $contact = $contacts[$i];
        $email = $emails[$i];
        $sql = "INSERT INTO sellr (s_Name, s_Mob, s_Email) VALUES ('$name', '$contact', '$email')";
        if (!mysqli_query($db, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        } else {
            $m = "Seller Added Successfully.";
            echo "<script type='text/javascript'>alert('$m');</script>";
            echo "<script type='text/javascript'>document.location.href = 'dyna_jqu_table.php',true</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        input[type="text"],
        input[type="email"] {
            width: calc(90% - 16px);
            padding: 6px;
            border: none;
            cursor: text;
        }

        #save {
            margin-left: 660px;
            height: 40px;
            width: 65px;
            background-color: green;
            color: white;
            font-size: 18px;
            font-weight: 600;
            border: none;
            border-radius: 15px;
        }

        #save:hover {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <form id="myForm" method="POST" action="">
        <table id="myTable">
            <thead style="background-color: #2A3F54; color: white;">
                <tr>
                    <th style="text-align: center;">Name</th>
                    <th style="text-align: center;">Contact</th>
                    <th style="text-align: center;">Email</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;"><input type="text" name="name[]" id="name" class="name" autofocus
                            required>
                    </td>
                    <td style="text-align: center;"><input type="text" name="contact[]" id="contact" class="contact"
                            required>
                    </td>
                    <td style="text-align: center;"><input type="email" name="email[]" class="emailInput" required></td>
                </tr>
            </tbody>
        </table>
        <br>

        <input type="submit" id="save" name="save" value="Save" style="text-align: center;">
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

            // $(document).on('change', '.name', function () {
            //     var name = $(this).val();
            //     alert(name);
            // });
            $(document).on('keypress', '.emailInput', function (event) {
                if (event.which === 13) {
                    event.preventDefault();
                    var formData = $('#myForm').serialize();
                    alert(formData);
                    if ($('#myForm')[0].checkValidity()) {
                        addRow();
                    } else {
                        alert('Please fill out all required fields.');
                    }
                }
            });

            // $(document).on('change', '.name', function () {
            //     var name = $(this).val();
            //     var $row = $(this).closest("tr"); // Particular selected row 
            //     $.ajax({
            //         url: "check_name.php", // Path to the PHP file that handles the AJAX request
            //         method: "POST",
            //         data: { name: name }, // Send the name to the server
            //         success: function (response) {
            //             // Handle the response from the server
            //             if (response === "exists") {
            //                 alert("Name already exists!")

            //                 $row.find(".name").val("");
            //             }
            //         }
            //     });
            // });
        });
        function addRow() {
            var newRow = '<tr><td style="text-align: center;"><input type="text" name="name[]" id="name" class="name" autofocus></td><td style="text-align: center;"><input type="text" id="contact" name="contact[]"></td><td style="text-align: center;"><input type="email" name="email[]" class="emailInput" id="emailInput" required></td></tr>';
            $('#myTable tbody').append(newRow);

        }

    </script>

</body>

</html>