<div class="container pseudoBattleQuiz">
    <form id="teamForm" class="pseudoForm">
        <button class="pseudo-btn" type="submit">Events</button>
    </form>
    <div class="registeredTeam">
        <select id="teamDropdown">
            <option value="">Select Event</option>
            <option value="create">Create Event</option>
        </select>
    </div>
</div>
<div class="showEventContainer" id="showEventContainer">
    <div class="col-md-4 teamContainer" id="teamContainer">
        <h2>TEAM</h2>        
    </div>
    <div class="col-md-4 analyticsContainer"><h2> Analytics </h2></div>
    <div class="col-md-4 rewardContainer"><h2> Rewards </h2></div>
    <div class="col-md-4 quizSetContainer"><h2> Quiz Set </h2></div>
    <div class="teamContainer-content" id="teamContainer-content" style="display: none;">
        <div class="modal-content">
            <button  id="backBtn"><img src="themes/images/arrow-left-solid.svg"></button>
            <div class="teams">
            <div class="allTeamMember-content">
            <h5>Team List</h5>
             <div class="allTeamMember"></div>
            </div>

                <div class=" teamList-content">
                <h5>BATTLE</h5>
                <div class="teamList"></div>
            </div>
           
            </div>

         </div>
    </div>
</div>

<div class="modal" id="createEventModal" tabindex="-1" role="dialog" aria-labelledby="createEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createEventModalLabel">Create Event</h5>
            </div>
            <div class="modal-body">
                <form id="eventForm">
                    <div class="form-group">
                        <label for="eventDate">Event Date:</label>
                        <input type="date" id="eventDate" name="eventDate" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModalBtn" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="confirmBtn">Confirm</button>
            </div>
        </div>
    </div>
</div>

<script src="themes/main/cpanel/quizMaster/js/pseudoBattle_script.js"></script>
