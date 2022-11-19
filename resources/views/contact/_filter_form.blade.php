<div class="row">
    <div class="col">
        <select name="filter_department" id="filter_department" class="custom-select" onchange="this.form.submit()">
            <option value="">All Departments</option>
            @foreach ($departments as $department)
                <option value="{{ $department->id }}" @if (request()->filter_department == $department->id) selected @endif>
                    {{ $department->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="col">
        <div class="input-group ∏mb-3">
            <input type="text" name='querytext' class="form-control" placeholder="Search..." aria-label="Search..."
                value="{{ request()->querytext }}" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">
                    <i class="fa fa-refresh"></i>
                </button>
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>

    </div>
</div>
