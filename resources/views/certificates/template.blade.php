<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Certificate</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Arial", sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .certificate {
            background: white;
            border: 50px solid #4a1db7;
            padding: 40px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: start;
            position: relative;
        }

        .certificate h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .certificate .logo {
            margin-bottom: 20px;
        }

        .certificate .recipient {
            font-size: 2em;
            font-weight: bold;
            color: #85cdc7;
            margin: 20px 0;
        }

        .certificate .details {
            font-size: 1.5em;
            margin: 15px 0;
        }

        .certificate .details strong {
            color: #85cdc7;
        }

        .certificate .footer {
            margin-top: 20px;
            font-size: 1em;
            color: gray;
        }

        .certificate .badge {
            position: absolute;
            text-align: center;
            top: 0px;
            right: 60px;
            background-color: #4a1db7;
            color: white;
            font-size: 1.5em;
            padding: 32px;
            font-weight: bold;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .certificate .badge h1 {
            font-size: 2em;
            margin-top: 20px;
        }

        .certificate .badge span {
            font-size: 1em;
        }

        .container {
            padding: 20px;
            border: #4a1db7 3px solid;
            height: 92.5%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .end {
            align-items: end;
        }
    </style>
</head>

<body>
    <div class="certificate">
        <div class="container">
            <div class="cont">
                <div class="badge">
                    <span>
                        SERTIFIKAT<br />
                        KOMPETENSI
                    </span>

                    <h1>NC</h1>
                </div>
                <h1>NusantaraCode</h1>
                <p class="details">Diberikan kepada</p>
                <p class="recipient">{{ $user->name }}</p>
                <p class="details">Atas kelulusannya pada kelas</p>
                <p class="details"><strong>{{ $course->name }}</strong></p>
            </div>
            <p class="details end">{{ $certificate->issue_date }}</p>
        </div>
    </div>
</body>

</html>
