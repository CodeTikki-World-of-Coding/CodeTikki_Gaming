<head>
    <style>
        .correct-answer{
            background-color:green;
        }
    </style>
</head>
<div class="container mt-5 admin_questionBank">
    <h2>Question Bank</h2>
    <form id="filter-form">
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="min-level">Minimum Level:</label>
                <input type="number" id="min-level" name="minLevel" class="form-control" min="0" max="900" step="100">
            </div>
            <div class="col-md-3">
                <label for="max-level">Maximum Level:</label>
                <input type="number" id="max-level" name="maxLevel" class="form-control" min="100" max="900" step="100">
            </div>
            <div class="col-md-3">
                <label for="creator">Creator:</label>
                <select id="creator" name="creator" class="form-control">
                    <option value="">All</option>
                    <!-- Populate with user data dynamically -->
                </select>
            </div>
            <div class="col-md-3">
                <label for="sort-by">Sort By:</label>
                <select id="sort-by" name="sortBy" class="form-control">
                    <option value="">Select</option>
                    <option value="asc">Level (Ascending)</option>
                    <option value="desc">Level (Descending)</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Apply Filters</button>
            </div>
        </div>
    </form>

    
    <!-- Table -->
    <table id="question-table" class="table table-striped">
        <thead>
            <tr>
                <th>Question ID</th>
                <th>Question Title</th>
                <th>Option 1</th>
                <th>Option 2</th>
                <th>Option 3</th>
                <th>Option 4</th>
                <th>Correct Option</th>
                <th>Level</th>
                <th>Attempts</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<script src="themes/main/cpanel/admin/js/questionBank_script.js"></script>
