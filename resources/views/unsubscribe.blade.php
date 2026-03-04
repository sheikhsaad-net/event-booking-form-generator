<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disiscrizione - Fondazione Il Carro di Mirabella</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
            border-top: 5px solid #8B0000;
        }
        h2 {
            color: #8B0000;
            margin-bottom: 20px;
        }
        p {
            color: #666;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 30px;
        }
        input[type="email"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        button {
            background-color: #8B0000;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            width: 100%;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #a11b1b;
        }
        .footer-link {
            margin-top: 20px;
            display: block;
            font-size: 12px;
            color: #999;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Disiscrizione</h2>

    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @else
        <p>Inserisci la tua email per non ricevere più comunicazioni dalla Fondazione.</p>
        
        <form action="{{ route('unsubscribe.store') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Inserisci la tua email" required value="{{ old('email') }}">
            <button type="submit">CONFERMA DISISCRIZIONE</button>
        </form>

        @if(session('error'))
            <p style="color: red; margin-top: 10px;">{{ session('error') }}</p>
        @endif
    @endif

    <a href="https://www.fondazioneilcarrodimirabella.it/" class="footer-link" style="margin-top: 20px; display: block;">Torna al sito della Fondazione</a>
</div>

</body>
</html>