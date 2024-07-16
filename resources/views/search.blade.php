<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            width: 100%;
            max-width: 48%;
            margin-bottom: 20px;
        }

        .empty-message {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <input type="text" id="search-input" class="form-control" placeholder="Search name/designation/department">
                </div>
            </div>
        </div>
        <div class="row card-container" id="card-container">
            <!-- Cards will be dynamically inserted here -->
        </div>
        <div class="empty-message" id="empty-message">No results to display.</div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function createCard(person) {
            return `
                <div class="card" data-name="${person.name}" data-designation="${person.designation_name}" data-department="${person.department_name}">
                    <div class="card-body">
                        <h5 class="card-title">${person.name}</h5>
                        <p class="card-text">${person.designation_name}</p>
                        <p class="card-text">${person.department_name}</p>
                    </div>
                </div>
            `;
        }

        function loadCards(filteredData) {
            const container = $('#card-container');
            container.empty();
            filteredData.forEach(person => {
                container.append(createCard(person));
            });
        }

        $(document).ready(function() {
            $('#empty-message').show();

            $('#search-input').on('input', function() {
                let filter = $(this).val().toLowerCase();

                if (filter.length > 0) {
                    $.ajax({
                        url: '/get_data',
                        type: 'GET',
                        data: {
                            query: filter
                        },
                        success: function(response) {
                            if (response.length > 0) {
                                $('#empty-message').hide();
                                loadCards(response);
                            } else {
                                $('#card-container').empty();
                                $('#empty-message').show();
                            }
                        },
                        error: function() {
                            $('#card-container').empty();
                            $('#empty-message').show();
                        }
                    });
                } else {

                    $('#card-container').empty();
                    $('#empty-message').show();
                }
            });

        });
    </script>
</body>

</html>