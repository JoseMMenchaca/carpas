<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table{
            font-size: 14px;
            width: 100%;
            border-collapse: collapse;
        }
        td{
            border: 1px solid;
        }
        thead tr{
            font-weight: bold;
            color: white;
            background-color: #2277e0;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <center>
        <h3>CARPAS EXISTENTES</h3>
    </center>

    <table>
        <thead>
            <tr>

                <td>Nº</td>
                <td>JUNTA VECINAL</td>
                <td>PRODUCTORA</td>
                <td>TAMAÑO DE LA CARPA</td>
                <td>C.I.</td>
                <td>CELULAR</td>
                <td>EDAD</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($comunarios as $i=>$item)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$item->entregas[0]->carpa->lugar}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->entregas[0]->carpa->dimension}}</td>
                    <td>{{$item->ci}}</td>
                    <td>{{$item->fono}}</td>
                    <td>{{$item->edad}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>