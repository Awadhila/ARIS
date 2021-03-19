
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
        <li class="nav-item" role="presentation">
            <a
            @if ($Objects["title"] == "Transaction")
                class="nav-link active sales" 
            @else  
                class="nav-link active" 
            @endif
            id="ex1-tab-1"
            data-toggle="tab"
            href="#ex1-tabs-1"
            role="tab"
            aria-controls="ex1-tabs-1"
            aria-selected="true"
            >@if ($Objects["title"] == "Transaction")
                Debit
            @else
                Form
            @endif
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a
            @if ($Objects["title"] == "Transaction")
                class="nav-link sales" 
            @else  
                class="nav-link" 
            @endif
            id="ex1-tab-2"
            data-toggle="tab"
            href="#ex1-tabs-2"
            role="tab"
            aria-controls="ex1-tabs-2"
            aria-selected="false"
            >@if ($Objects["title"] == "Transaction")
                Credit
            @else
                List
            @endif
            </a>          
        </li>
        @if ($Objects["title"] == "Transaction")
        <li class="nav-item" role="presentation">
            <a
            class="nav-link active delivery"
            id="ex1-tab-1"
            data-toggle="tab"
            href="#ex1-tabs-1"
            role="tab"
            aria-controls="ex1-tabs-1"
            aria-selected="true"
            >@if ($Objects["title"] == "Transaction")
                Debit
            @else
                Form
            @endif
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a
            class="nav-link "
            id="ex1-tab-2"
            data-toggle="tab"
            href="#ex1-tabs-2"
            role="tab"
            aria-controls="ex1-tabs-2"
            aria-selected="false"
            >@if ($Objects["title"] == "Transaction")
                Credit
            @else
                List
            @endif
            </a>          
        </li>
        @endif
    </ul>
</div>

   
