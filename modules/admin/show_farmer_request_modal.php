<!-- Farmer Request Prompt -->
<div class="popupSuccess" x-show="show_farmer_request_form" style="display: none">
    <div class="popup-contentSuccess" x-data="show_farmer_request_modal">
        <div class="popup-child1" style="margin-bottom: 5px">
            <div style="display: flex; flex-direction: column;">
                <h1 style="font-weight: bolder">Farmer Requests</h1>
                    <hr>
                    <div style="display: flex; align-self: flex-end">
                        <input type="search_farmer_request" placeholder="Search Request">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <!-- <th>No.</th> -->
                                    <th>Program</th>
                                    <th>Service Type</th>
                                    <th>Service Remarks</th>
                                    <th>Crops Kilo</th>
                                    <th>Date Requested</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-if="farmer_records">
                                    <template x-for="(row, index) in custom_pagination(farmer_records)">
                                        <tr>
                                            <!-- <th scope="row"><span x-text="(index + 1)"></span></th> -->
                                            <!-- <td><span x-text="row.request_id"></span></td> -->
                                            <td><span x-text="row.request_type"></span></td>
                                            <td><span x-text="get_service_name(row.crop_id, row.service_id)"></span></td>
                                            <td><span x-text="row.service_remarks ? row.service_remarks : 'N/A'"></span></td>
                                            <td><span x-text="row.crops_kilo ? row.crops_kilo : 'N/A'"></span></td>
                                            <td><span x-text="row.date_requested"></span></td>
                                            <td>
                                                <button class="btn btn-success" style="top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="delete_request(row.request_id, row.user_id, 'Crop')">Delete</button>
                                            </td>
                                        </tr>
                                    </template>
                                </template>
                            </tbody>
                        </table>
                    <div style="display: flex; flex-direction: row; justify-content: space-evenly">
                        <button class="btn btn-success" x-on:click="prevPage" :disabled="pageNumber==0" >Back</button>
                        <button class="btn btn-success" x-on:click="nextPage" :disabled="pageNumber >= pageCount() -1">Next</button>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <br>
        <button type="button" class="btn btn-success" style="width: 50%; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="confirm_farmer_request_exit">Confirm</button>
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
            'size': 2,
            'total': "",

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
        }));
    });
</script>