<!-- Add Services Prompt -->
<div class="popupActivate" x-show="show_manage_farmer_form" style="display: none">
    <div class="popup-contentActivate" x-data="manage_farmer_modal">
        <div class="popup-child1" style="margin-bottom: 5px">
            <div style="display: flex; flex-direction: column;">
                <h1 style="font-weight: bolder">Manage Farmers Account</h1>
                <!-- <h3 style="color: red" x-text="admin_error_msg"></h3>
                <h3 style="color: green" x-text="admin_success_msg"></h3> -->
                <div class="row-fluid" style="background-color: white; min-height: 400px; padding:10px;">
                <hr>
                    <div style="position: relative; display: flex; justify-content: flex-end">
                        <input type="text" placeholder="Enter details..." x-model="search_farmer" x-on:keyup="search_farmer_func()" x-on:keyup.backspace="search_farmer_func()" placeholder="Search Farmer">
                    </div>
                    <div class="span12">
                        <div class="table-responsive" style="max-width: 950px; max-height: auto; overflow: auto;">
                            <table class="table table-hover table-sm" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="min-width: 150px; text-align: center;">Commodity</th>
                                        <th style="min-width: 150px; text-align: center;">First Name</th>
                                        <th style="min-width: 150px; text-align: center;">Middle Name</th>
                                        <th style="min-width: 150px; text-align: center;">Last Name</th>
                                        <th style="min-width: 150px; text-align: center;">Birth Date</th>
                                        <th style="min-width: 150px; text-align: center;">Civil Status</th>
                                        <th style="min-width: 150px; text-align: center;">Sex</th>
                                        <th style="min-width: 150px; text-align: center;">Contact No.</th>
                                        <th style="min-width: 150px; text-align: center;">Religion</th>
                                        <th style="min-width: 150px; text-align: center;">Birth Place</th>
                                        <th style="min-width: 150px; text-align: center;">Address Street</th>
                                        <th style="min-width: 150px; text-align: center;">Address Barangay</th>
                                        <th style="min-width: 150px; text-align: center;">Address Municipality</th>
                                        <th style="min-width: 150px; text-align: center;">Address Zip Code</th>
                                        <th style="min-width: 150px; text-align: center;">Guardian Fullname</th>
                                        <th style="min-width: 150px; text-align: center;">Guardian No.</th>
                                        <th style="min-width: 150px; text-align: center;">Farm Type</th>
                                        <th style="min-width: 150px; text-align: center;">Farm Barangay</th>
                                        <th style="min-width: 150px; text-align: center;">Farm Municipality</th>
                                        <th style="min-width: 150px; text-align: center;">Farm Area</th>
                                        <th style="min-width: 150px; text-align: center;">Email</th>
                                        <th style="min-width: 150px; text-align: center;">Status</th>
                                        <th style="min-width: 150px; text-align: center;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-if="user_details">
                                        <template x-for="(row, index) in custom_pagination(user_details)">
                                            <tr>
                                                <td style="min-width: 150px; text-align: center;"><span x-text="row.role_service == 1 ? 'High Value Crops' : (row.role_service == 2 ? 'Corn Value Crop' : 'Rice Crop');"></span></td>
                                                <td style="min-width: 150px; text-align: center;"><span x-text="row.first_name"></span></td>
                                                <td style="min-width: 150px; text-align: center;"><span x-text="row.middle_name"></span></td>
                                                <td style="min-width: 150px; text-align: center;"><span x-text="row.last_name"></span></td>
                                                <td style="min-width: 150px; text-align: center;"><span x-text="row.birth_date"></span></td>
                                                <td style="min-width: 150px; text-align: center;"><span x-text="row.civil_status == 1 ? 'Married' : (row.civil_status == 2 ? 'Single' : 'Widowed');"></span></td>
                                                <td style="min-width: 150px; text-align: center;"><span x-text="row.sex == 1 ? 'Male' : 'Female';"></span></td>
                                                <td style="min-width: 150px; text-align: center;"><span x-text="row.contact_no"></span></td>
                                                <td style="min-width: 150px; text-align: center;"><span x-text="row.religion"></span></td>
                                                <td style="min-width: 150px; text-align: center;"><span x-text="row.birth_place"></span></td>
                                                <td style="min-width: 150px; text-align: center;"><span x-text="row.address_street"></span></td>
                                                <td style="min-width: 150px; text-align: center;"><span x-text="row.address_barangay"></span></td>
                                                <td style="min-width: 150px; text-align: center;"><span x-text="row.address_municipality"></span></td>
                                                <td style="min-width: 150px; text-align: center;"><span x-text="row.address_zip"></span></td>
                                                <td style="min-width: 150px; text-align: center;"><span x-text="row.guardian_fname"></span></td>
                                                <td style="min-width: 150px; text-align: center;"><span x-text="row.guardian_contact"></span></td>
                                                <td style="min-width: 150px; text-align: center;"><span x-text="row.farm_type == 1 ? 'High Value Crops' : (row.role_service == 2 ? 'Corn Value Crop' : 'Rice Crop');"></span></td>
                                                <td style="min-width: 150px; text-align: center;"><span x-text="row.farm_barangay"></span></td>
                                                <td style="min-width: 150px; text-align: center;"><span x-text="row.farm_municipality"></span></td>
                                                <td style="min-width: 150px; text-align: center;"><span x-text="row.farm_area"></span></td>
                                                <td style="min-width: 150px; text-align: center;"><span x-text="row.username"></span></td>
                                                <td style="min-width: 150px; text-align: center">
                                                    <template x-if="row.status == 1">
                                                        <h4 style="color: green; font-weight: bold">Approved</h4>
                                                    </template>
                                                    <template x-if="row.status == 0">
                                                        <h4 style="color: red; font-weight: bold">Pending</h4>
                                                    </template>
                                                <!-- <button class="btn btn-danger" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="delete_request(row.request_id, row.user_id, 'Crop')">Delete</button> -->
                                                </td>
                                                <td style="min-width: 150px; text-align: center">
                                                    <div style="display: flex; flex-direction: flex-end; align-items: space-around">
                                                        <button class="btn btn-success" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="update_farmer_registration_form = true">Update</button>
                                                        <template x-if="row.status == 0">
                                                            <button class="btn btn-success" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="">Approve</button>
                                                        </template>
                                                    </div>
                                                </td>
                                            </tr>
                                        </template>
                                    </template>
                                </tbody>
                            </table>
                    </div>
                </div>
                <hr>
                <div style="display: flex; flex-direction: row; justify-content: space-evenly">
                    <button class="btn btn-success" x-on:click="prevPage" :disabled="pageNumber==0" >Back</button>
                    <button class="btn btn-success" x-on:click="nextPage" :disabled="pageNumber >= pageCount() -1">Next</button>
                </div>
            </div>
        </div>
        </div>
        <div class="popup-child2">
            <a id="errorClose" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="confirm_activate_account_exit">X</a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('manage_farmer_modal', () => ({
            // Pagination Javascript
            'search': "",
            'pageNumber': 0,
            'size': 5,
            'total': "",

            search_farmer: '',

            async search_farmer_func(){
                const preseve_rec = this.user_details;
                this.user_details = [];

                if(this.search_farmer != ''){
                    for (const key in preseve_rec) {
                        if (Object.hasOwnProperty.call(preseve_rec, key)) {
                            const element = preseve_rec[key];
                            let row_record = ((element.first_name) + ' ' + (element.middle_name) + ' ' + (element.last_name) + ' ' + (element.role_service == 1 ? 'High Value Crops' : (element.role_service == 2 ? 'Corn Value Crop' : 'Rice Crop')) + ' ' + (element.birth_date) + ' ' + (element.civil_status == 1 ? 'Married' : (element.civil_status == 2 ? 'Single' : 'Widowed')) + ' ' + (element.sex) + ' ' + (element.contact_no) + ' ' + (element.religion) + ' ' + (element.birth_place) + ' ' + (element.address_street) + ' ' + (element.address_barangay) + ' ' + (element.address_municipality) + ' ' + (element.address_zip) + ' ' + (element.guardian_fname) + ' ' + (element.guardian_contact) + ' ' + (element.farm_type) + ' ' + (element.farm_barangay) + ' ' + (element.farm_municipality) + ' ' + (element.farm_area) + ' ' + (element.username)).toLowerCase();
                            
                            if(row_record.includes(this.search_farmer.toLowerCase())){
                                this.user_details.push(element);
                            };
                        }
                    }
                }
                else {
                    this.user_details = this.user_details_backup;
                }
            },

            custom_pagination(paginate_records) {
                const start = this.pageNumber * this.size,
                end = start + this.size;

                // this.total = this.services.length;
                this.total = paginate_records.length;
                return this.user_details.slice(start, end);
            },

            //Create array of all pages (for loop to display page numbers)
            pages() {
                return Array.from({
                    length: Math.ceil(this.total / this.size),
                });
            },

            //Next Page
            nextPage() {
                this.pageNumber++;
            },

            //Previous Page
            prevPage() {
                this.pageNumber--;
            },

            //Total number of pages
            pageCount() {
                return Math.ceil(this.total / this.size);
            },

            //Return the start range of the paginated results
            startResults() {
                return this.pageNumber * this.size + 1;
            },

            //Return the end range of the paginated results
            endResults() {
                let resultsOnPage = (this.pageNumber + 1) * this.size;

                if (resultsOnPage <= this.total) {
                    return resultsOnPage;
                }

                return this.total;
            },

            //Link to navigate to page
            viewPage(index) {
                this.pageNumber = index;
            },
        }));
    });
</script>