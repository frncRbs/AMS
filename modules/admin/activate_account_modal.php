<!-- Add Services Prompt -->
<div class="popupActivate" x-show="show_activate_account_form" style="display: none">
    <div class="popup-contentActivate" x-data="activate_account_modal">
        <div class="popup-child1" style="margin-bottom: 5px">
            <div style="display: flex; flex-direction: column;">
                <h1 style="font-weight: bolder">Farmers Account</h1>
                <hr>
                <!-- <h3 style="color: red" x-text="admin_error_msg"></h3>
                <h3 style="color: green" x-text="admin_success_msg"></h3> -->
                <div class="row-fluid" style="background-color: white; min-height: 400px; padding:10px;">
                    <div style="position: relative; display: flex; justify-content: flex-end">
                        <input type="search_farmer" placeholder="Search Farmer" x-model="search_farmer" x-on:keyup="search_farmer_func()" x-on:keyup.backspace="search_farmer_func()" placeholder="Search Farmer">
                    </div>
                    <div class="span12">
                        <br>
                        <div class="table-responsive" style="max-width: 950px; max-height: auto; overflow: auto;">
                            <table class="table table-hover table-sm" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">First Name</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Middle Name</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Last Name</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Commodity</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Birth Date</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Civil Status</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Sex</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Contact No.</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Religion</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Birth Place</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Address Street</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Address Barangay</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Address Municipality</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Address Zip Code</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Guardian Fullname</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Guardian No.</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Farm Type</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Farm Barangay</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Farm Municipality</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Farm Area</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Username</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Verify</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Is active</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-if="user_details">
                                        <template x-for="(row, index) in custom_pagination(user_details)">
                                            <tr>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.first_name"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.middle_name"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.last_name"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.role_service == 1 ? 'High Value Crops' : (row.role_service == 2 ? 'Corn Value Crop' : 'Rice Crop');"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.birth_date"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.civil_status == 1 ? 'Married' : (row.civil_status == 2 ? 'Single' : 'Widowed');"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.sex == 1 ? 'Male' : 'Female';"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.contact_no"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.religion"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.birth_place"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.address_street"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.address_barangay"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.address_municipality"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.address_zip"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.guardian_fname"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.guardian_contact"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.farm_type == 1 ? 'High Value Crops' : (row.role_service == 2 ? 'Corn Value Crop' : 'Rice Crop');"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.farm_barangay"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.farm_municipality"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.farm_area"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.username"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">
                                                    
                                                    <template x-if="row.status == 0">
                                                        <button class="btn btn-success" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em">Approve</button>
                                                    </template>
                                                    <template x-if="row.status == 1">
                                                        <h4 style="color: green; font-weight: bold">Verified</h4>
                                                    </template>
                                                </td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">
                                                    <!-- <button class="btn btn-success" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="delete_request(row.request_id, row.user_id, 'Crop')">View</button> -->
                                                    <template x-if="row.is_active == 1 && row.status == 1">
                                                        <button class="btn btn-danger" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="">Deactivate</button>
                                                    </template>
                                                    <template x-if="row.is_active == 0 && row.status == 0">
                                                        <h4 style="color: red; font-weight: bold">Unverified</h4>
                                                    </template>
                                                    <template x-if="row.is_active == 0 && row.status == 1">
                                                        <button class="btn btn-success" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="">Activate</button>
                                                    </template>
                                                </td>

                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">
                                                    <!-- <button class="btn btn-success" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="delete_request(row.request_id, row.user_id, 'Crop')">View</button> -->
                                                    <button class="btn btn-danger" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="">Delete</button>
                                                </td>
                                            </tr>
                                        </template>
                                    </template>
                                </tbody>
                            </table>
                        <hr>
                    </div>
                </div>
                <div style="display: flex; flex-direction: row; justify-content: space-evenly">
                    <button class="btn btn-success" x-on:click="prevPage" :disabled="pageNumber==0" >Back</button>
                    <button class="btn btn-success" x-on:click="nextPage" :disabled="pageNumber >= pageCount() -1">Next</button>
                </div>
            </div>
        </div>
        </div>
        <br>
        <div class="popup-child2">
            <a id="errorClose" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="confirm_activate_account_exit">X</a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('activate_account_modal', () => ({
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