<!-- @extends('layouts.app')  -->

@section('title', 'Perfil de Usuario')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Perfil de {{ $user->name }}</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <!-- Foto de perfil -->
                            <div class="col-md-4">
                                <img src="{{ $user->avatar ?? 'https://www.gravatar.com/avatar/'.md5(strtolower(trim($user->email))) }}" alt="Avatar de {{ $user->name }}" class="img-fluid rounded-circle" style="max-width: 150px;">
                            </div>

                            <div class="col-md-8">
                                <ul class="list-unstyled">
                                    <li><strong>Nombre:</strong> {{ $user->name }}</li>
                                    <li><strong>Email:</strong> {{ $user->email }}</li>
                                    <li><strong>Rol:</strong> {{ $user->getRoleNames()->first() ?? 'Sin rol asignado' }}</li>
                                    <li><strong>Miembro desde:</strong> {{ $user->created_at->format('d/m/Y') }}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Editar perfil</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
