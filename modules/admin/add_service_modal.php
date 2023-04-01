<!-- Add Services Prompt -->
<div class="popupError" x-show="show_services_form" style="display: none">
    <div class="popup-contentError" x-data="add_service_modal">
        <div class="popup-child1" style="margin-bottom: 5px">
            <div style="display: flex; flex-direction: column;">
                <h1 style="font-weight: bolder">Add Service</h1>
                <hr>
                <div class="row-fluid" style="background-color: white; min-height: 400px; padding:10px;">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            </div>
                            <div class="widget-content nopadding">
                                <div class="column">
                                    <div class="col-xs-12 col-sm-6 col-md-12" style="margin: 10px 0 10px;">
                                        <div class="form-group" >
                                        <label for="last_name" style="font-weight: bold">Service:</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Add service" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="button" class="btn btn-success" style="width: 50%" x-on:click="confirm_reset">Confirm</button>
                        <hr>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>Service Name</th>
                                        <th>Date Created</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-if="services">
                                        <template x-for="(service, index) in custom_pagination(services)">
                                            <tr>
                                                <!-- <th scope="row"><span x-text="(index + 1)"></span></th> -->
                                                <!-- <td><span x-text="row.request_id"></span></td> -->
                                                <td><span x-text="service.service_name"></span></td>
                                                <td><span x-text="service.date_created"></span></td>
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
        </div>
        </div>
        <br>
        <div class="popup-child2">
            <a id="errorClose" class="btn btn-success" style="position:absolute; top:0; right:0; text-decoration: none; z-index: 1; cursor: pointer; border-radius: 5em" x-on:click="confirm_reset">X</a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('add_service_modal', () => ({ 
            // Pagination Javascript
            'search': "",
            'pageNumber': 0,
            'size': 2,
            'total': "",

            custom_pagination(paginate_records) {
                const start = this.pageNumber * this.size,
                end = start + this.size;

                // this.total = this.services.length;
                this.total = paginate_records.length;
                return this.services.slice(start, end);
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