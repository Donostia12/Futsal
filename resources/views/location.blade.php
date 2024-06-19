<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Location</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <h1>This is a latitude and longitude test</h1>
    
    <button onclick="getLocation()">Get Location</button>

    <div id="show"></div>
  
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            var data = {
                latitude: latitude,
                longitude: longitude
            };
            var jsonData = JSON.stringify(data);
            alert(jsonData);
            $.ajax({
                type: 'POST',
                url: 'http://127.0.0.1:8000/api/findlapangan',
                data: jsonData,
                contentType: 'application/json',
                success: function(response) {
                    displayResults(response);
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        }

        function displayResults(data) {
            var container = document.getElementById("show");
            container.innerHTML = ""; // Clear previous results

            data.forEach(function(item) {
                var div = document.createElement("div");
                div.innerHTML = "ID: " + item.id + "<br>" +
                                "Nama: " + item.nama + "<br>" +
                                "Distance: " + item.distance + " km<br><br>";
                container.appendChild(div);
            });
        }

        function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }
    </script>




<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        var data = {
            latitude: latitude,
            longitude: longitude
        };
        var jsonData = JSON.stringify(data);
       
        $.ajax({
            type: 'POST',
            url: 'http://127.0.0.1:8000/api/findlapangan',
            data: jsonData,
            contentType: 'application/json',
            success: function(response) {
                displayResults(response);
            },
            error: function(xhr, status, error) {
                console.error("Error: " + error);
            }
        });
    }

    function displayResults(data) {
        var container = document.getElementById("show");
        container.innerHTML = ""; // Clear previous results

        var row = document.createElement("div");
        row.classList.add("row");

        data.forEach(function(item) {
            var div = document.createElement("div");
            div.innerHTML = `
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="trend-item rounded box-shadow">
                        <div class="trend-image position-relative">
                            <center><img src="images/${item.image}" alt="image" class=""><center>
                        
                            <div class="color-overlay"></div>
                        </div>
                        <div class="trend-content p-4 pt-5 position-relative bg-white">
                            <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                <div class="entry-author">
                                    <i class="icon-calendar"></i>
                                    <span class="fw-bold"> ${item.distance}km</span>
                                </div>
                            </div>
                            <h5 class="theme mb-1"><i class="flaticon-location-pin"></i> Spain</h5>
                            <h3 class="mb-1"><a href="tour-grid.html">${item.name}</a></h3>
                            <div class="rating-main d-flex align-items-center pb-2">
                                <div class="rating">
                                 
                                    <span class="fa fa-star checked"></span>
                                    <span>4.5</span>
                                </div>
                                <span class="ms-2">(21)</span>
                            </div>
                            <p class=" border-b pb-2 mb-2">${item.desc}</p>
                            <div class="entry-meta">
                                <div class="entry-author d-flex align-items-center">
                                    <p class="mb-0"><span class="theme fw-bold fs-5">${item.harga} </span> | Per
                                        person</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            row.appendChild(div);
        });

        container.appendChild(row);
    }

    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                alert("User denied the request for Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                alert("The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                alert("An unknown error occurred.");
                break;
        }
    }
</script>
</body>
</html>
