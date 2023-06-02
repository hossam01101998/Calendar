@extends('layouts.app')
@section('content')


<div class="container">
    <h1>Kalender</h1>
    <div id="agenda">
    </div>

</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#event">
  PLAN
</button>

<!-- Modal -->
<div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nieuwe Plan</h5>
                    <button type="button" class="close" id="btnClose2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">

                <form action="">

                    {{ csrf_field() }}

                    <div class="form-group d-none" >
                      <label for="id">ID</label>
                      <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                      {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                    </div>

                    <div class="form-group">
                      <label for="title">Titel</label>
                      <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Schrijf maar de titel van de event">
                      {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                    </div>

                    <div class="form-group">
                    <label for="description">Beschrijving van het evenement</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Waarover gaat het?"></textarea>
                    </div>

                    <div class="form-group">
                    <label for="start">Begin Datum</label>
                    <input type="text" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="yyyy-mm-dd HH:ii:ss">
                    <small id="helpId" class="form-text text-muted">yyyy-mm-dd HH:ii:ss</small>
                    </div>

                    <div class="form-group">
                    <label for="end">Einde Datum</label>
                    <input type="text" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="yyyy-mm-dd HH:ii:ss">
                    <small id="helpId" class="form-text text-muted">yyyy-mm-dd HH:ii:ss</small>
                    </div>

                    {{-- <div class="form-group">
                        <div class="input-group">
                            <div class="input-column" style="margin-right: 10%">
                                <label for="starthour">Van</label>
                                <input type="time" class="form-control" name="starthour" id="starthour" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="input-column">
                                <label for="endhour">Tot</label>
                                <input type="time" class="form-control" name="endhour" id="endhour" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                    </div> --}}


                </form>


            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-success" id="btnSave">Save</button>
                <button type="button" class="btn btn-warning" id="btnModify">Modify</button>
                <button type="button" class="btn btn-danger" id="btnDelete">Delete</button>

                <button type="button" class="btn btn-secondary" id="btnClose" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

@endsection

{{-- <script src="js/agenda.js"></script> --}}

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script> --}}

{{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.js"></script> --}}

