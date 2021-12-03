 <form  >

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" id="name" name="s_name" value="{{ $student->s_name}}" readonly />
                        </div>
                        <div class="form-group">
                            <label for="name">
                                Student ID</label>
                            <input type="text" class="form-control" id="s_id" name="s_id" value="{{ $student->s_id}}" readonly />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <input type="email" class="form-control" id="email" name="email" value="{{ $student->email}}" readonly /></div>
                        </div>

                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                           <div class="input-group">
                                <input type="text" class="form-control" name="subject"value="{{ $student->subject}}" readonly /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Due Date</label>
                           <div class="input-group">
                                <input type="text" class="form-control" name="subject"value="{{ $student->due_date}}" readonly /></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" name="message" class="form-control" rows="9" cols="25"placeholder="Message" readonly>{{ $student->message}}</textarea>
                        </div>
                        <div class="form-group">
                           <div class="input-group">
                               @if($student->status=='pending')
                               <h3> Status: <span class="label label-danger">Pending</span></h3> 
                               @elseif($student->status=='progress')
                               <h3> Status: <span class="label label-warning">Progress</span></h3> 
                               @elseif($student->status=='done')
                               <h3> Status: <span class="label label-success">Complete</span></h3> 
                               @endif
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-12">
                        <!--<button type="submit" class="btn btn-success pull-right" data-id="{{url('studentinfo/$student->id')}}">Complete Status</button>-->
                    </div>
                </form>