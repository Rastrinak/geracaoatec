<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-4">
            <h1>Criar Sessão</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('sessions') }}">Fichas de Utente</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Criar Ficha de Utente</li>
                </ol>
            </nav>

            <form method="POST" action="{{ url('sessions') }}">
                @csrf

                <div class="form-group">
                    <label for="group" class="font-weight-bold">Nº Ficha de Utente</label>
                    <div>
                        <select
                            id="user_forms_id"
                            name="user_forms_id"
                            class="form-select custom-select
                            @error('user_forms_id') is-invalid @enderror"
                            aria-describedby="studentHelp">

                            @foreach($userForms as $userForm)
                                <option value=" {{ $userForm->id}} ">
                                    {{ $userForm->id }}
                                </option>
                            @endforeach

                            @error('user')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="begin_time" class="font-weight-bold">Data</label>
                    <input
                        type="datetime-local"
                        id="begin_time"
                        name="begin_time"
                        autocomplete="begin_time"
                        placeholder="Data"
                        class="form-control
                        @error('begin_time') is-invalid @enderror"
                        value="{{ old('begin_time') }}"
                        required
                        aria-describedby="dateHelp">

                    @error('begin_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name" class="font-weight-bold">Comentários</label>
                    <input
                        type="text"
                        id="comments"
                        name="comments"
                        autocomplete="comments"
                        placeholder="Comentários"
                        class="form-control
                        @error('comments') is-invalid @enderror"
                        value="{{ old('comments') }}"
                        required
                        aria-describedby="nameHelp">

                    @error('comments')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <a href="{{ url('sessions') }}" class="mt-2 mb-5 btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                         class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                    Voltar</a>
                <button type="submit" class="mt-2 mb-5 btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                         class="bi bi-check2" viewBox="0 0 16 16">
                        <path
                            d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                    </svg>
                    Criar
                </button>
            </form>

        </div>
    </div>
</div>


