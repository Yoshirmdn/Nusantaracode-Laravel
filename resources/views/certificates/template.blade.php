<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right, #4A90E2, #6A4BFF);
        }

        .certificate {
            background: white;
            width: 90%;
            height: 70%;
            border: 15px solid #4A90E2;
            padding: 40px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-radius: 10px;
            position: relative;
            background-image: url('{{ asset('img/icon/Path.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .certificate h1 {
            color: #4A90E2;
            font-size: 3em;
            margin-bottom: 10px;
        }

        .certificate .logo img {
            width: 100px;
            height: auto;
            margin-bottom: 20px;
        }

        .certificate .recipient {
            font-size: 2.5em;
            font-weight: bold;
            margin: 20px 0;
        }

        .certificate .details {
            font-size: 1.5em;
            margin: 15px 0;
        }

        .certificate .details strong {
            color: #6A4BFF;
        }

        .certificate .footer {
            margin-top: 20px;
            font-size: 1em;
            color: gray;
        }
    </style>
</head>

<body>
    <div class="certificate">
        <div class="logo">
            <img src="{{ asset('img/Logo-new.png') }}" alt="Logo">
        </div>
        <h1>Certificate of Completion</h1>
        <p class="recipient">{{ $user->name }}</p>
        <p class="details">Has successfully completed the course</p>
        <p class="details"><strong>{{ $course->name }}</strong></p>
        <p class="details">Issued on {{ $certificate->issue_date }}</p>
        <div class="footer">
            This certificate is awarded in recognition of the hard work and dedication shown during the course.
        </div>
    </div>
</body>

</html>
