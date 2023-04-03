<!-- Add Services Prompt -->
<div class="popupActivate" x-show="show_activate_account_form" style="display: none">
    <div class="popup-contentActivate" x-data="activate_account_modal">
        <div class="popup-child1" style="margin-bottom: 5px">
            <div style="display: flex; flex-direction: column;">
                <h1 style="font-weight: bolder">Farmer pending account(s)</h1>
                <hr>
                <h3 style="color: red" x-text="admin_error_msg"></h3>
                <h3 style="color: green" x-text="admin_success_msg"></h3>
                    <div style="display: flex; align-self: flex-end">
                        <input type="search_farmer_request" placeholder="Search Farmer">
                    </div>
                <div class="row-fluid" style="background-color: white; min-height: 400px; padding:10px;">
                    <div class="span12">
                        <br>
                        <div class="table-responsive" style="max-width: 900px; max-height: 400px; overflow: auto;">
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
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Role</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Username</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Approve</th>
                                        <th style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">Decline</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-if="user_details">
                                        <template x-for="(row, index) in user_details">
                                            <tr>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.first_name"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.middle_name"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.last_name"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.role_service"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.birth_date"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.civil_status"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.sex"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.contact_no"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.religion"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.birth_place"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.address_street"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.address_barangay"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.address_municipality"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.address_zip"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.guardian_fname"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.guardian_contact"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.farm_type"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.farm_barangay"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.farm_municipality"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.farm_area"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.role"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd"><span x-text="row.username"></span></td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">
                                                    <!-- <button class="btn btn-success" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="delete_request(row.request_id, row.user_id, 'Crop')">View</button> -->
                                                    <button class="btn btn-success" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em">Approve</button>
                                                </td>
                                                <td style="min-width: 150px; padding: 0; text-align: center; border: 1px solid #ddd">
                                                    <!-- <button class="btn btn-success" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="delete_request(row.request_id, row.user_id, 'Crop')">View</button> -->
                                                    <button class="btn btn-danger" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="">Decline</button>
                                                </td>
                                            </tr>
                                        </template>
                                    </template>
                                </tbody>
                            </table>
                            <!-- <div style="display: flex; flex-direction: row; justify-content: space-evenly">
                                <button class="btn btn-success" x-on:click="prevPage" :disabled="pageNumber==0" >Back</button>
                                <button class="btn btn-success" x-on:click="nextPage" :disabled="pageNumber >= pageCount() -1">Next</button>
                            </div> -->
                        <hr>
                    </div>
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
            // 'search': "",
            // 'pageNumber': 0,
            // 'size': 2,
            // 'total': "",

            // custom_pagination(paginate_records) {
            //     const start = this.pageNumber * this.size,
            //     end = start + this.size;

            //     // this.total = this.services.length;
            //     this.total = paginate_records.length;
            //     return this.services.slice(start, end);
            // },

            // //Create array of all pages (for loop to display page numbers)
            // pages() {
            //     return Array.from({
            //         length: Math.ceil(this.total / this.size),
            //     });
            // },

            // //Next Page
            // nextPage() {
            //     this.pageNumber++;
            // },

            // //Previous Page
            // prevPage() {
            //     this.pageNumber--;
            // },

            // //Total number of pages
            // pageCount() {
            //     return Math.ceil(this.total / this.size);
            // },

            // //Return the start range of the paginated results
            // startResults() {
            //     return this.pageNumber * this.size + 1;
            // },

            // //Return the end range of the paginated results
            // endResults() {
            //     let resultsOnPage = (this.pageNumber + 1) * this.size;

            //     if (resultsOnPage <= this.total) {
            //         return resultsOnPage;
            //     }

            //     return this.total;
            // },

            // //Link to navigate to page
            // viewPage(index) {
            //     this.pageNumber = index;
            // },
        }));
    });
</script>