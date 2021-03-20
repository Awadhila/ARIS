
<form id="searchForm">

    <div class="row">
        <div class="col-sm">
            <label for="searchlbl" class="form-label">Search</label>
        </div>
        <div class="col-sm">
                <input type="text" class="form-control" id="searchlbl" placeholder="What are you looking for?">
        </div>
        <div class="col-sm">
            <button type="submit" class="form-control btn btn-primary mb-2">Search</button>

        </div>
      </div>
</form>
<div id="tabsMenu" >
    <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
        <li id="tab1" class="nav-item" role="presentation">
            <a
            class="tab1 nav-link active" 
            id="ex1-tab-1"
            data-toggle="tab"
            href="#ex1-tabs-1"
            role="tab"
            aria-controls="ex1-tabs-1"
            aria-selected="false"
            >@if ($Objects["title"] == "Transaction")
                Debit
            @else
                Form
            @endif
            </a>
        </li>
        <li id="tab2" class="nav-item" role="presentation">
            <a
            class="tab2 nav-link" 
            id="ex1-tab-2"
            data-toggle="tab"
            href="#ex1-tabs-2"
            role="tab"
            aria-controls="ex1-tabs-2"
            aria-selected="true"
            >@if ($Objects["title"] == "Transaction")
                Credit
            @else
                List
            @endif
            </a>          
        </li>
    </ul>
</div>

   
