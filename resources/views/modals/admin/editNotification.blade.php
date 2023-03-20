<div class="modal fade" id="editNotification" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-3 px-5 uppercase bg-teal-500 shadow-lg shadow-cyan-500/50">
                <h4 class="title text-center font-extrabold" id="editNotification">Admin Modifier Notificaton </h4>
            </div>
            <div class="text-center mt-6">
                <span id="eventstatus" class="px-3 py-1 uppercase rounded-md text-white"></span>
            </div>
            <form id="editmyform" action="" method="post" class="form-group px-4 py-3">
                <div class="">

                    <a id="fileEmbed" target="_blank" href=""
                        class="float-left hover:underline text-blue-900 hidden"><i
                            class="zmdi text-xl zmdi-file-text"></i>
                    </a>
                </div>
                @csrf
                @method('put')
                <div class="input-group masked-input mb-3 shdow-md">
                    <div class="input-group-prepend shadow-md">
                        <span class="input-group-text"><i class="zmdi zmdi-comment-alt-text"></i></span>
                    </div>
                    <input id="editEventTile" name="title" type="text" class="form-control shadow-md"
                        placeholder="Titre de la tâche" value="" required>
                </div>
                <div class="input-group masked-input mb-3 shadow-md">
                    <div class="input-group-prepend shadow-md">
                        <span class="input-group-text"><i class="zmdi zmdi-calendar-note"></i></span>
                    </div>
                    <input class="form-control  shadow-md" id="editeventDate" type="datetime-local" name="start">

                </div>
                <select name="status" id="editEventStatus" class="w-full border border-gray-100 rounded shadow-md">
                    <option class="text-warning" value="En attente">En attente</option>
                    {{-- <option class="text-danger" value="Rejete">Rejete</option> --}}
                    <option class="text-success" value="Valide">Valide</option>
                </select>
                <textarea class="form-control shadow-md mt-3" name="description" id="editEventDescription" cols="30" rows="5"
                    placeholder="Description"></textarea>
            </form>

            <div class="flex justify-between mb-4 px-4">
                <div class="float-left">
                    <form id="deleteOneEventForm" action="" method="get">
                        @csrf
                        <button id="deleteOneEventButton" class="btn btn-danger float-left shadow-md">Supprimé</butt>
                    </form>
                </div>
                <button form="editmyform" type="submit" class="btn btn-primary text-white waves-effect shadow-md">
                    Modifier
                </button>
                <button type="button" class="btn btn-muted text-white waves-effect shadow-md"
                    data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
