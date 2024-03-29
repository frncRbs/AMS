<!-- Farmer Request Prompt -->
<div class="popupSuccess" x-show="show_farmer_request_form" style="display: none">
    <div class="popup-contentSuccess" x-data="show_farmer_request_modal" style="width: 900px;">
        <div class="popup-child1">
            <div style="display: flex; flex-direction: column;">
                <h1 style="font-weight: bolder">Farmer Requests</h1>
                    <hr>
                    <a :href="export_url" class="btn btn-success" style="position: relative; float: right; padding: 5px">Generate Report</a>
                    <!-- <a href="../../controller/exports/export_farmer_request.php" style="float: right; padding: 5px" x-on:click="test_session">Generate Report</a> -->
                    <div style="display: flex; align-self: flex-end; width: 100%; display: none">
                        <select class="selectD" x-model="search_program" x-on:keyup="search_program_func()" x-on:keyup.backspace="search_program_func()" style="width: 100%; height: auto; margin-bottom: 0; padding: 5px; border-radius: 3px">
                            <option value="" disabled selected hidden>Select Program</option>
                            <option value="1">Crops</option>
                            <option value="2">Services</option>
                        </select>
                    </div>
                    <br>
                    <div class="table-responsive" style="max-width: 830px; max-height: auto; overflow: auto;">
                        <table class="table table-hover table-sm" style="width: 100%;">
                            <thead>
                                <tr>
                                    <!-- <th>No.</th> -->
                                    <th style="min-width: 150px; text-align: center">Program</th>
                                    <th style="min-width: 150px; text-align: center">Request Type</th>
                                    <th style="min-width: 150px; text-align: center">Service Remarks</th>
                                    <th style="min-width: 150px; text-align: center">Crops Kilo</th>
                                    <th style="min-width: 150px; text-align: center">Date Requested</th>
                                    <th style="min-width: 150px; text-align: center">Status</th>
                                    <th style="min-width: 150px; text-align: center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-if="farmer_records">
                                    <template x-for="(row, index) in custom_pagination(farmer_records)">
                                        <tr>
                                            <!-- <th scope="row"><span x-text="(index + 1)"></span></th> -->
                                            <!-- <td><span x-text="row.request_id"></span></td> -->
                                            <td style="min-width: 150px; text-align: center"><span x-text="row.request_type"></span></td>
                                            <td style="min-width: 150px; text-align: center"><span x-text="get_service_name(row.crop_id, row.service_id)"></span></td>
                                            <td style="min-width: 150px; text-align: center"><span x-text="row.service_remarks ? row.service_remarks : 'N/A'"></span></td>
                                            <td style="min-width: 150px; text-align: center"><span x-text="row.crops_kilo ? row.crops_kilo : 'N/A'"></span></td>
                                            <td style="min-width: 150px; text-align: center"><span x-text="row.date_requested"></span></td>
                                            
                                            <td style="min-width: 150px; text-align: center">
                                                <template x-if="row.request_status == 1 && row.is_cancelled == 0">
                                                    <h4 style="color: green; font-weight: bold">Approved</h4>
                                                </template>
                                                <template x-if="row.request_status == 0 && row.is_cancelled == 0">
                                                    <h4 style="color: red; font-weight: bold">Pending</h4>
                                                </template>
                                                <template x-if="row.request_status == 2 && row.is_cancelled == 0">
                                                    <h4 style="color: red; font-weight: bold">Declined</h4>
                                                </template>
                                                <template x-if="row.is_cancelled == 1">
                                                    <h4 style="color: red; font-weight: bold">Cancelled</h4>
                                                </template>
                                                <!-- <button class="btn btn-danger" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="delete_request(row.request_id, row.user_id, 'Crop')">Delete</button> -->
                                            </td>
                                            <td style="min-width: 150px; text-align: center">
                                                <div style="display: flex; flex-direction: flex-end; align-items: space-around">
                                                    <template x-if="row.request_status == 0 && row.is_cancelled == 0">
                                                        <button class="btn btn-success" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="approve_farmer_request(row)">Approve</button>
                                                    </template>
                                                    <template x-if="row.request_status == 0 && row.is_cancelled == 0">
                                                        <button class="btn btn-danger" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="show_decline_request_form = true, r_request_id = row.request_id, r_user_id = row.user_id, r_request_type = row.request_type">Decline</button>
                                                    </template>
                                                </div>
                                            </td>
                                        </tr>
                                    </template>
                                </template>
                            </tbody>
                        </table>
                </div>
                <hr>
                <div style="display: flex; flex-direction: row; justify-content: space-evenly">
                    <button class="btn btn-success" x-on:click="prevPage" :disabled="pageNumber==0" >Back</button>
                    <button class="btn btn-success" x-on:click="nextPage" :disabled="pageNumber >= pageCount() -1">Next</button>
                </div>
                <br>
            </div>
        </div>
        <!-- <button type="button" class="btn btn-success" style="width: 50%; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="confirm_farmer_request_exit">Confirm</button> -->
        <div class="popup-child2">
            <a id="errorClose" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="confirm_farmer_request_exit">X</a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('show_farmer_request_modal', () => ({ 
            // Pagination Javascript
            'search': "",
            'pageNumber': 0,
            'size': 5,
            'total': "",

            search_program: '',

            async search_program_func(){
                const preseve_rec = this.farmer_records;
                this.farmer_records = [];

                if(this.search_program != ''){
                    for (const key in preseve_rec) {
                        if (Object.hasOwnProperty.call(preseve_rec, key)) {
                            const element = preseve_rec[key];
                            let row_record = ((element.request_type)).toLowerCase();
                            
                            if(row_record.includes(this.search_program.toLowerCase())){
                                this.farmer_records.push(element);
                            };
                        }
                    }
                }
                else {
                    this.farmer_records = this.farmer_records_backup;
                }
            },

            custom_pagination(paginate_records) {
                const start = this.pageNumber * this.size,
                end = start + this.size;

                // this.total = this.farmer_records.length;
                this.total = paginate_records.length;
                return this.farmer_records.slice(start, end);
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

            async approve_farmer_request(row){
                // console.log(row.request_id);
                const options = {
                    xsrfHeaderName: 'X-XSRF-TOKEN',
                    xsrfCookieName: 'XSRF-TOKEN',
                };
                let data = {
                    request_id: row.request_id,
                    request_status: true,
                    user_id: row.user_id,
                };
                let mail_data = {
                    user_id: row.user_id,
                    subject: row.request_type + ' REQUEST',
                    message: this.$refs.decline_message.value,
                };
                this.show_loading_form = true;
                await axios.post('../../controller/admin/approve_farmer_request.php', data, options)
                .then((response) => {
                    // if(response.data.status == 'true'){
                    //     this.farmer_records = response.data.requests_registry;
                    // }
                    // else {
                    //     // ERROR MESSAGE
                    // }
                    // this.farmer_records = response.data;
                    if(response.data.status == 'true'){
                        this.farmer_records = response.data.requests_registry;
                        this.show_decline_request_form = false;

                        axios.post('../../controller/sendmail/sendmail_approve_request.php', mail_data, options)
                        .then((mail_response) => {
                            console.log(mail_response.data);
                            this.farmer_records = response.data.requests_registry;
                            setTimeout(() => {
                                this.show_loading_form = false;
                                this.$refs.declinerequest_button.disabled = false;
                                this.$refs.decline_message.value = '';
                            }, 2000);
                        });
                    }
                });
            }
        }));
    });
</script>