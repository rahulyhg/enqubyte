<div class="card rounded-0 border-bottom-0 border-top-0">
    <div class="card-body filter-form-section">
        <form action="">
            <div class="row">
                <div class="col-sm-4 form-group">
                    <input type="text" name="start_date" value="{{request('start_date') ? request('start_date') : '' }}" class="form-control startDatepicker" placeholder="Start Date" autocomplete="off" required>
                </div>
                <div class="col-sm-4 form-group">
                    <input type="text" name="end_date" value="{{request('end_date') ? request('end_date') : '' }}" class="form-control endDatepicker" placeholder="End Date" autocomplete="off" required>
                </div>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary btn-lg">Apply Filter</button>
                </div>
            </div>
        </form>
    </div>
</div>