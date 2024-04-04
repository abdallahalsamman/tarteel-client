<div class="row">
    <div class="col-sm-12">
        <table {{ $attributes }} class="table table-bordered table-striped" role="grid">

            <thead>
                {{ $thead_tfoot }}
                
            </thead>

            <tbody>
                {{ $tbody }}
            </tbody>
            
            <tfoot>
                {{ $thead_tfoot }}
            </tfoot>
        </table>
    </div>
</div>