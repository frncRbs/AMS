<!-- Add Services Prompt -->
<div class="popupActivate" x-show="show_manage_personnel_form" style="display: none">
    <div class="popup-contentActivate" x-data="manage_personnel_modal">
        <div class="popup-child1" style="margin-bottom: 5px">
            <div style="display: flex; flex-direction: column;">
                <h1 style="font-weight: bolder">Manage Personnels Account</h1>
                <h3 style="color: red; font-weight: bold" x-text="admin_error_msg"></h3>
                <h3 style="color: green; font-weight: bold" x-text="admin_success_msg"></h3>
                <div class="row-fluid" style="background-color: white; min-height: 400px; padding:10px;">
                <hr>
                    <div style="position: relative; display: flex; justify-content: flex-end">
                        <a href="../../controller/exports/export_personnel.php" style="float: right; padding: 5px">Generate Report</a>
                        <input type="text" placeholder="Enter details..." x-model="search_personnel" x-on:keyup="search_personnel_func()" x-on:keyup.backspace="search_personnel_func()" placeholder="Search Personnel">
                    </div>
                    <div class="span12">
                        <div class="table-responsive" style="max-width: 950px; max-height: auto; overflow: auto;">
                            <table class="table table-hover table-sm" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="min-width: 150px; text-align: center">Commodity</th>
                                        <th style="min-width: 150px; text-align: center">First Name</th>
                                        <th style="min-width: 150px; text-align: center">Middle Name</th>
                                        <th style="min-width: 150px; text-align: center">Last Name</th>
                                        <th style="min-width: 150px; text-align: center">Birth Date</th>
                                        <th style="min-width: 150px; text-align: center">Sex</th>
                                        <th style="min-width: 150px; text-align: center">Contact No.</th>
                                        <th style="min-width: 150px; text-align: center">Religion</th>
                                        <th style="min-width: 150px; text-align: center">Birth Place</th>
                                        <th style="min-width: 150px; text-align: center">Address Street</th>
                                        <th style="min-width: 150px; text-align: center">Address Barangay</th>
                                        <th style="min-width: 150px; text-align: center">Address Municipality</th>
                                        <th style="min-width: 150px; text-align: center">Email</th>
                                        <th style="min-width: 150px; text-align: center">Role</th>
                                        <th style="min-width: 150px; text-align: center">Status</th>
                                        <th style="min-width: 150px; text-align: center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-if="personnel_details">
                                        <template x-for="(row, index) in custom_pagination(personnel_details)">
                                            <tr>
                                                <td style="min-width: 150px; text-align: center"><span x-text="row.role_service == 1 ? 'High Value Crops' : (row.role_service == 2 ? 'Corn Value Crop' : 'Rice Crop');"></span></td>
                                                <td style="min-width: 150px; text-align: center"><span x-text="row.first_name"></span></td>
                                                <td style="min-width: 150px; text-align: center"><span x-text="row.middle_name"></span></td>
                                                <td style="min-width: 150px; text-align: center"><span x-text="row.last_name"></span></td>
                                                <td style="min-width: 150px; text-align: center"><span x-text="row.birth_date"></span></td>
                                                <td style="min-width: 150px; text-align: center"><span x-text="row.sex == 1 ? 'Male' : 'Female';"></span></td>
                                                <td style="min-width: 150px; text-align: center"><span x-text="row.contact_no"></span></td>
                                                <td style="min-width: 150px; text-align: center"><span x-text="row.religion"></span></td>
                                                <td style="min-width: 150px; text-align: center"><span x-text="row.birth_place"></span></td>
                                                <td style="min-width: 150px; text-align: center"><span x-text="row.address_street"></span></td>
                                                <td style="min-width: 150px; text-align: center"><span x-text="row.address_barangay"></span></td>
                                                <td style="min-width: 150px; text-align: center"><span x-text="row.address_municipality"></span></td>
                                                <td style="min-width: 150px; text-align: center"><span x-text="row.username"></span></td>
                                                <td style="min-width: 150px; text-align: center"><span x-text="row.role"></span></td>
                                                <td style="min-width: 150px; text-align: center">
                                                    <template x-if="row.is_active == 1">
                                                        <h4 style="color: green; font-weight: bold">Active</h4>
                                                    </template>
                                                    <template x-if="row.is_active == 0">
                                                        <h4 style="color: red; font-weight: bold">Inactive</h4>
                                                    </template>
                                                <!-- <button class="btn btn-danger" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="delete_request(row.request_id, row.user_id, 'Crop')">Delete</button> -->
                                                </td>
                                                <td style="min-width: 150px; text-align: center">
                                                    <div style="display: flex; flex-direction: flex-end">
                                                        <button class="btn btn-success" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="update_personnel_registration_form = true, p_id = row.id, p_fn = row.first_name, p_mn = row.middle_name, p_ln = row.last_name, p_role_s = row.role_service, p_b_date = row.birth_date, p_c_status = row.civil_status, p_seggs = row.sex, p_c_no = row.contact_no, p_rel = row.religion, p_b_place = row.birth_place, p_a_street = row.address_street, p_a_barangay = row.address_barangay, p_a_municipality = row.address_municipality, p_user_n = row.username, p_secret_p = row.secret_phrase, p_role = row.role">Update</button>
                                                        <template x-if="row.is_active == 1">
                                                            <button class="btn btn-danger" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="show_deactivate_personnel_account_form = true, p_id = row.id, p_fn = row.first_name, p_is_active = row.is_active">Deactivate</button>
                                                        </template>
                                                        <template x-if="row.is_active == 0">
                                                            <button class="btn btn-success" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="activate_personnel_account, p_id = row.id, p_is_active = row.is_active">Activate</button>
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
                    <button class="btn btn-success" x-on:click="prevPage" :disabled="pageNumber==0">Back</button>
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
        Alpine.data('manage_personnel_modal', () => ({
            // Pagination Javascript
            'search': "",
            'pageNumber': 0,
            'size': 5,
            'total': "",

            search_personnel: '',

            async search_personnel_func(){
                const preseve_rec = this.personnel_details;
                this.personnel_details = [];

                if(this.search_personnel != ''){
                    for (const key in preseve_rec) {
                        if (Object.hasOwnProperty.call(preseve_rec, key)) {
                            const element = preseve_rec[key];
                            let row_record = ((element.role_service == 1 ? 'High Value Crops' : (element.role_service == 2 ? 'Corn Value Crop' : 'Rice Crop')) + ' ' + (element.first_name) + ' ' + (element.middle_name) + ' ' + (element.last_name) + ' ' + (element.birth_date) + ' ' + (element.civil_status == 1 ? 'Married' : (element.civil_status == 2 ? 'Single' : 'Widowed')) + ' ' + (element.sex) + ' ' + (element.contact_no) + ' ' + (element.religion) + ' ' + (element.birth_place) + ' ' + (element.address_street) + ' ' + (element.address_barangay) + ' ' + (element.address_municipality) + ' ' + (element.username)).toLowerCase();
                            
                            if(row_record.includes(this.search_personnel.toLowerCase())){
                                this.personnel_details.push(element);
                            };
                        }
                    }
                }
                else {
                    this.personnel_details = this.personnel_details_backup;
                }
            },

            custom_pagination(paginate_records) {
                const start = this.pageNumber * this.size,
                end = start + this.size;

                // this.total = this.services.length;
                this.total = paginate_records.length;
                return this.personnel_details.slice(start, end);
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