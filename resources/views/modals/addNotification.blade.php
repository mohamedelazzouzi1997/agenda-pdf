<div class="modal fade" id="addNotification" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-3 px-5 uppercase bg-teal-500 shadow-lg shadow-cyan-500/50">
                <h4 class="title text-center font-extrabold" id="addNotification">Nouvelle Notificaton </h4>
            </div>
            <form id="myform" action="{{ route('store.event') }}" method="post" class="form-group px-4 py-3">
                @csrf
                <div class="input-group masked-input mb-3">
                    <div class="input-group-prepend shadow-md">
                        <span class="input-group-text"><i class="zmdi zmdi-comment-alt-text"></i></span>
                    </div>
                    <input name="title" type="text" class="form-control shadow-md" placeholder="Titre de la tâche"
                        required>
                </div>
                <div class="input-group masked-input mb-3">
                    <div class="input-group-prepend shadow-md">
                        <span class="input-group-text"><i class="zmdi zmdi-calendar-note"></i></span>
                    </div>
                    <input name="start" type="datetime-local" class="form-control datetime shadow-md"
                        placeholder="Ex: 30/07/2016 23:59" required>
                </div>
                {{-- <label for="description">Description</label> --}}
                <textarea class="form-control shadow-md" name="description" id="" cols="30" rows="5"
                    placeholder="Description"></textarea>
            </form>
            <div class="modal-footer">
                <button form="myform" type="submit"
                    class="px-6 py-2 bg-teal-500 rounded-lg shadow-xl hover:bg-teal-600 text-white waves-effect">
                    Enregistrer
                </button>
                <button type="button"
                    class="px-6 py-2 bg-red-500 shadow-xl hover:bg-red-600 rounded-lg text-white waves-effect"
                    data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
