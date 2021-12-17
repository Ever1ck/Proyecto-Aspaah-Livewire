<div>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombres</th>
        </tr>
        </thead>
        <tbody>
        @foreach($socios as $socio)
            <tr>
                <td>{{ $socio->id_persona }}</td>
                <td>{{ $socio->nombre }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>