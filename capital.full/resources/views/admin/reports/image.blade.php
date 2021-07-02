<certificate-component :attributes="{{ $report }}" inline-template class="float-left">

    <div id="image-{{ $report->id }}" class="">

        <div class="card card-body bg-light">
            <span class="admin-image-delete" @click="destroy">
                <i class="fa fa-times-circle-o" aria-hidden="true"></i>
            </span>

            <img src="{{ asset('storage/images/reports/'.$report->certificate) }}" alt="Card image cap"  class="img-fluid">
        </div>
    </div>
 
</certificate-component>