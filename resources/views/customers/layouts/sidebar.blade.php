<div class="col-lg-3">
    <!-- Toggle button -->
    <button
            class="btn btn-outline-secondary mb-3 w-100 d-lg-none"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
    <span>Show filter</span>
    </button>
    <!-- Collapsible wrapper -->
    <div class="collapse card d-lg-block mb-5" id="navbarSupportedContent">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button
                            class="accordion-button text-dark bg-light"
                            type="button"
                            data-mdb-toggle="collapse"
                            data-mdb-target="#panelsStayOpen-collapseOne"
                            aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseOne"
                            >
                    Tìm kiếm từ khóa
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                    <div class="accordion-body">
                        <!-- Checked checkbox -->
                        <input type="text" class="w-100 form-control" name="q" value="{{ $q }}" placeholder="Enter product...">
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button
                            class="accordion-button text-dark bg-light"
                            type="button"
                            data-mdb-toggle="collapse"
                            data-mdb-target="#panelsStayOpen-collapseOne"
                            aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseOne"
                            >
                    Danh mục
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                    <div class="accordion-body">
                        <!-- Checked checkbox -->
                        @foreach ( $categories as $category )
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="categoryId" value="{{ $category->id }}" id="flexCheckChecked{{ $category->id }}"
                                    @if ($categoryId == $category->id)
                                        checked
                                    @endif
                                />
                                <label class="form-check-label" for="flexCheckChecked{{ $category->id }}">{{ $category->name }}</label>
                                <span class="badge badge-secondary float-end">120</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
