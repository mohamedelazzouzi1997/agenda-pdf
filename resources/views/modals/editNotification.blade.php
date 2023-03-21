<div class="modal fade" id="editNotification" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-3 px-5 uppercase bg-teal-500 shadow-lg shadow-cyan-500/50">
                <h4 class="title text-center font-extrabold" id="editNotification">Modifier Notificaton </h4>
            </div>
            <div class="text-center mt-6">
                <span id="eventstatus" class="px-3 py-1 uppercase rounded-md text-white"></span>
            </div>

            <form id="editmyform" action="" method="post" class="form-group px-4 py-3"
                enctype="multipart/form-data">
                <a id="fileEmbed" target="_blank" href=""
                    class="badge float-right badge-primary hover:underline text-blue-900 hidden">PDF <i
                        class="zmdi text-xl zmdi-file-text"></i>
                </a>
                @csrf
                @method('put')
                <div class="input-group masked-input mb-3">
                    <div class="input-group-prepend shadow-md">
                        <span class="input-group-text"><i class="zmdi zmdi-comment-alt-text"></i></span>
                    </div>
                    <input id="editEventTile" name="title" type="text" class="form-control shadow-md"
                        placeholder="Titre de la tâche" value="" required>
                </div>
                <div class="input-group masked-input mb-3">
                    <div class="input-group-prepend shadow-md">
                        <span class="input-group-text"><i class="zmdi zmdi-calendar-note"></i></span>
                    </div>
                    <p id="editeventDate" class="form-control datetime shadow-md">
                    </p>
                </div>
                <div class="input-group masked-input mb-3">
                    <div class="input-group-prepend shadow-md">
                        <span class="input-group-text"><i class="zmdi zmdi-file-text"></i></span>
                    </div>
                    <input id="evenFile" name="file" type="file" class="form-control shadow-md">
                </div>
                <textarea class="form-control shadow-md" name="description" id="editEventDescription" cols="30" rows="5"
                    placeholder="Description"></textarea>
            </form>

            <div class="modal-footer">
                <button form="editmyform" type="submit"
                    class="px-6 py-1 bg-teal-500 rounded-lg shadow-xl hover:bg-teal-600 text-white waves-effect">
                    Modifier
                </button>
                <button type="button"
                    class="px-6 py-1 bg-red-500 shadow-xl hover:bg-red-600 rounded-lg text-white waves-effect"
                    data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
