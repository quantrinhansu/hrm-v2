@extends('layouts.app')

@section('content')
<div class="profile">
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
    <div class="page-header pull-left">
        <div class="page-title">Profile</div>
    </div>
    <ol class="breadcrumb page-breadcrumb">
        <li><i class="fa fa-home"></i>&nbsp;<a href="/">Home</a>&nbsp;&nbsp;<i
                class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><a href="#">Tables</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Responsive Tables</li>
    </ol>
    <div class="btn btn-blue reportrange hide"><i class="fa fa-calendar"></i>&nbsp;<span></span>&nbsp;report&nbsp;<i
            class="fa fa-angle-down"></i><input type="hidden" name="datestart"/><input type="hidden"
                                                                                       name="endstart"/>
    </div>
    <div class="clearfix"></div>
</div>    

<div class="page-content">
    <div id="page-user-profile" class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="text-center mbl"><img
                                src="{{ $user->avatar }}"
                                style="border: 5px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);"
                                class="img-circle" alt="avatar"/></div>
                    </div>
                    <table class="table table-striped table-hover">
                        <tbody>
                        <tr>
                            <td width="50%"><i class="fa fa-user margin-r-5"></i> User Name</td>
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        </tr>
                        <tr>
                            <td width="50%"><i class="fa fa-envelope margin-r-5"></i> Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td width="50%"><i class="fa fa-map-marker margin-r-5"></i> Address</td>
                            <td>{{ $user->present_address }}</td>
                        </tr>
                       	<tr>
                       		<td><strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong></td>
                       		<td>
                       			{{ $user->skill }}
              				</td>
                       	</tr>
                       	<tr>
                       		<td><strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong></td>
                       		<td>
                       			{{ $user->noted }}
              				</td>
                       	</tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-9">
                    <ul class="nav nav-tabs ul-edit responsive">
                        <li class="active"><a href="#tab-activity" data-toggle="tab"><i
                                class="fa fa-bolt"></i>&nbsp;
                            Activity</a></li>
                        <li><a href="#one-column" data-toggle="tab"><i
                                class="fa fa-steam"></i>&nbsp;
                            Timeline</a></li>
                        <li><a href="#tab-edit" data-toggle="tab"><i class="fa fa-edit"></i>&nbsp;
                            Edit Profile</a></li>
                    </ul>
                    <div id="generalTabContent" class="tab-content">
                        <div id="tab-activity" class="tab-pane fade in active">
                            <ul class="list-activity list-unstyled">
                                <li>
                                    <div class="avatar"><img
                                            src=""
                                            class="img-circle" alt="image"/></div>
                                    <div class="body">
                                        <div class="desc"><strong class="mrs">Diane Harris</strong>posted a
                                            new note<br/>
                                            <small class="text-muted">1 days ago at 6:18am</small>
                                        </div>
                                        <div class="content"><a href="#"><strong>Ut enim ad minim
                                            veniam</strong></a>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                                do eiusmod tempor incididunt ut labore et dolore magna
                                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="avatar"><img
                                            src=""
                                            class="img-circle" alt="image"/></div>
                                    <div class="body">
                                        <div class="desc"><strong class="mrs">Justin Coleman</strong>posted
                                            a new blog<br/>
                                            <small class="text-muted">3 days ago at 12:20am</small>
                                        </div>
                                        <div class="content">
                                            <div class="content-thumb"><img
                                                    src="http://swlabs.co/madmin/code/images/gallery/media4.jpg"
                                                    alt="" class="img-responsive"/></div>
                                            <div class="content-info"><a href="#"><strong>Excepteur sint
                                                occaecat cupidatat</strong></a>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                    sed do eiusmod tempor incididunt ut labore et dolore
                                                    magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                    exercitation ullamco laboris nisi ut aliquip ex ea
                                                    commodo consequat.Sed ut perspiciatis unde omnis iste
                                                    natus error sit voluptatem accusantium doloremque
                                                    laudantium, totam rem aperiam.</p></div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="avatar"><img
                                            src=""
                                            class="img-circle" alt="image"/></div>
                                    <div class="body">
                                        <div class="desc"><strong class="mrs">Jack Price</strong>posted a
                                            new blog<br/>
                                            <small class="text-muted">4 days ago at 3:08pm</small>
                                        </div>
                                        <div class="content">
                                            <div class="content-thumb"><img
                                                    src="http://swlabs.co/madmin/code/images/gallery/media5.jpg"
                                                    alt="" class="img-responsive"/></div>
                                            <div class="content-info"><a href="#"><strong>Finibus Bonorum et
                                                Malorum</strong></a>

                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                    sed do eiusmod tempor incididunt ut labore et dolore
                                                    magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                    exercitation ullamco laboris nisi ut aliquip ex ea
                                                    commodo consequat.Sed ut perspiciatis unde omnis iste
                                                    natus error sit voluptatem accusantium doloremque
                                                    laudantium, totam rem aperiam.</p></div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="avatar"><img
                                            src=""
                                            class="img-circle" alt="image"/></div>
                                    <div class="body">
                                        <div class="desc"><strong class="mrs">Jordan Walsh</strong>uploaded
                                            3 pictures<br/>
                                            <small class="text-muted">7 days ago at 9:15pm</small>
                                        </div>
                                        <div class="content">
                                            <div class="content-thumb-large"><img
                                                    src="http://swlabs.co/madmin/code/images/gallery/media1.jpg"
                                                    alt="" class="img-responsive"/><img
                                                    src="http://swlabs.co/madmin/code/images/gallery/media2.jpg"
                                                    alt="" class="img-responsive"/><img
                                                    src="http://swlabs.co/madmin/code/images/gallery/media3.jpg"
                                                    alt="" class="img-responsive"/></div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="avatar"><img
                                            src=""
                                            class="img-circle" alt="image"/></div>
                                    <div class="body">
                                        <div class="desc"><strong class="mrs">Phillip Bailey</strong>posted
                                            news 3 tasks<br/>
                                            <small class="text-muted">10 days ago at 2:15pm</small>
                                        </div>
                                        <div class="content">
                                            <div class="row">
                                                <div class="col-md-4"><span class="task-item"><span
                                                        class="task-item"></span>Admin Template<small
                                                        class="pull-right text-muted">80%
                                                </small></span>

                                                    <div class="progress progress-sm">
                                                        <div role="progressbar" aria-valuenow="80"
                                                             aria-valuemin="0" aria-valuemax="100"
                                                             style="width: 80%;"
                                                             class="progress-bar progress-bar-orange"><span
                                                                class="sr-only">80% Complete (success)</span>
                                                        </div>
                                                    </div>
                                                    <span class="task-item">Wordpress Themes<small
                                                            class="pull-right text-muted">40%
                                                    </small></span>

                                                    <div class="progress progress-sm">
                                                        <div role="progressbar" aria-valuenow="40"
                                                             aria-valuemin="0" aria-valuemax="100"
                                                             style="width: 40%;"
                                                             class="progress-bar progress-bar-success"><span
                                                                class="sr-only">40% Complete (success)</span>
                                                        </div>
                                                    </div>
                                                    <span class="task-item">Landing Page<small
                                                            class="pull-right text-muted">67%
                                                    </small></span>

                                                    <div class="progress progress-sm">
                                                        <div role="progressbar" aria-valuenow="67"
                                                             aria-valuemin="0" aria-valuemax="100"
                                                             style="width: 67%;"
                                                             class="progress-bar progress-bar-warning"><span
                                                                class="sr-only">67% Complete (success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div id="one-column" class="tab-pane fade">
                                <div id="md9" class="message-item blue">
                                    <div class="message-inner">
                                        <div class="message-head clearfix">
                                            <div class="avatar pull-left"><a href="#"><img
                                                    src="" alt="image"/></a>
                                            </div>
                                            <div class="user-detail"><h5 class="handle">John Doe</h5></div>
                                            <div class="post-meta">
                                                <div class="asker-meta"><span class="qa-message-when"><span
                                                        class="qa-message-when-data">Jan 21</span></span><span
                                                        class="qa-message-who"><span
                                                        class="qa-message-who-pad">by </span><span
                                                        class="qa-message-who-data"></span><a href="#">Oleg
                                                    Kolesnichenko</a></span></div>
                                            </div>
                                        </div>
                                        <div class="qa-message-content">Yo! Like this.</div>
                                    </div>
                                </div>
                                <div id="m8" class="message-item red">
                                    <div class="message-inner">
                                        <div class="message-head clearfix">
                                            <div class="avatar pull-left"><a href="#"><img
                                                    src="" alt="image"/></a>
                                            </div>
                                            <div class="user-detail"><h5 class="handle">amiya</h5></div>
                                            <div class="post-meta">
                                                <div class="asker-meta"><span class="qa-message-what"></span><span
                                                        class="qa-message-when"><span class="qa-message-when-data">Nov 24, 2013</span></span><span
                                                        class="qa-message-who"><span
                                                        class="qa-message-who-pad">by </span><span
                                                        class="qa-message-who-data"></span><a href="#">amiya</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="qa-message-content">Nice theme . Excellent one .</div>
                                    </div>
                                </div>
                                <div id="m7" class="message-item green">
                                    <div class="message-inner">
                                        <div class="message-head clearfix">
                                            <div class="avatar pull-left"><a href="#"><img
                                                    src="" alt="image"/></a>
                                            </div>
                                            <div class="user-detail"><h5 class="handle">russell</h5>

                                                <div class="post-meta">
                                                    <div class="asker-meta"><span class="qa-message-what"></span><span
                                                            class="qa-message-when"><span class="qa-message-when-data">Oct 25, 2013</span></span><span
                                                            class="qa-message-who"><span
                                                            class="qa-message-who-pad">by </span><span
                                                            class="qa-message-who-data"></span><a
                                                            href="#">russell</a></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="qa-message-content">Nullam porta leo vitae ipsum feugiat viverra. In
                                            sed placerat mi. Nullam euismod, quam in euismod rhoncus, tellus velit
                                            posuere tortor, non cursus nunc velit et lacus.
                                        </div>
                                    </div>
                                </div>
                                <div id="m6" class="message-item orange">
                                    <div class="message-inner">
                                        <div class="message-head clearfix">
                                            <div class="avatar pull-left"><a href="#"><img
                                                    src="" alt="image"/></a>
                                            </div>
                                            <div class="user-detail"><h5 class="handle">juggornot</h5>

                                                <div class="post-meta">
                                                    <div class="asker-meta"><span class="qa-message-what"></span><span
                                                            class="qa-message-when"><span class="qa-message-when-data">Oct 24, 2013</span></span><span
                                                            class="qa-message-who"><span
                                                            class="qa-message-who-pad">by </span><span
                                                            class="qa-message-who-data"></span><a href="#">juggornot</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="qa-message-content">Integer vitae arcu vitae ligula Cras vestibulum
                                            suscipit odio ac dapibus. In hac habitasse platea dictumst. Cras pulvinar
                                            erat et nunc fringilla, quis molestie
                                        </div>
                                    </div>
                                </div>
                                <div id="m5" class="message-item pink">
                                    <div class="message-inner">
                                        <div class="message-head clearfix">
                                            <div class="avatar pull-left"><a href="#"><img
                                                    src="" alt="image"/></a>
                                            </div>
                                            <div class="user-detail"><h5 class="handle">one_eyed</h5>

                                                <div class="post-meta">
                                                    <div class="asker-meta"><span class="qa-message-what"></span><span
                                                            class="qa-message-when"><span class="qa-message-when-data">Oct 24, 2013</span></span><span
                                                            class="qa-message-who"><span
                                                            class="qa-message-who-pad">by </span><span
                                                            class="qa-message-who-data"></span><a href="#">one_eyed</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="qa-message-content">Nulla dui ante, pulvinar ac auctor vitae,
                                            sollicitudin et tortor. Cras vestibulum suscipit odio ac dapibus. In hac
                                            habitasse platea dictumst. Cras pulvinar erat et nunc fringilla, quis
                                            molestie diam pulvinar.
                                        </div>
                                    </div>
                                </div>
                                <div id="m4" class="message-item green">
                                    <div class="message-inner">
                                        <div class="message-head clearfix">
                                            <div class="avatar pull-left"><a href="#"><img
                                                    src="" alt="image"/></a>
                                            </div>
                                            <div class="user-detail"><h5 class="handle">muboy</h5>

                                                <div class="post-meta">
                                                    <div class="asker-meta"><span class="qa-message-what"></span><span
                                                            class="qa-message-when"><span class="qa-message-when-data">Oct 24, 2013</span></span><span
                                                            class="qa-message-who"><span
                                                            class="qa-message-who-pad">by </span><span
                                                            class="qa-message-who-data"></span><a
                                                            href="#">muboy</a></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="qa-message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Phasellus fermentum iaculis mi, non dapibus nulla eleifend
                                            sed. Etiam ac commodo leo.<br/>Donec non sem id tellus mattis convallis.
                                            Morbi dapibus nulla ac dui lacinia,
                                        </div>
                                    </div>
                                </div>
                                <div id="m3" class="message-item blue">
                                    <div class="message-inner">
                                        <div class="message-head clearfix">
                                            <div class="avatar pull-left"><a href="#"><img
                                                    src="" alt="image"/></a>
                                            </div>
                                            <div class="user-detail"><h5 class="handle">muboy</h5>

                                                <div class="post-meta">
                                                    <div class="asker-meta"><span class="qa-message-what"></span><span
                                                            class="qa-message-when"><span class="qa-message-when-data">Oct 24, 2013</span></span><span
                                                            class="qa-message-who"><span
                                                            class="qa-message-who-pad">by </span><span
                                                            class="qa-message-who-data"></span><a
                                                            href="#">muboy</a></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="qa-message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Phasellus fermentum iaculis mi, non dapibus nulla eleifend
                                            sed. Etiam ac commodo leo.<br/>Donec non sem id tellus mattis convallis.
                                            Morbi dapibus nulla ac dui lacinia,
                                        </div>
                                    </div>
                                </div>
                                <div id="m2" class="message-item orange">
                                    <div class="message-inner">
                                        <div class="message-head clearfix">
                                            <div class="avatar pull-left"><a href="#"><img
                                                    src="" alt="image"/></a>
                                            </div>
                                            <div class="user-detail"><h5 class="handle">muboy</h5>

                                                <div class="post-meta">
                                                    <div class="asker-meta"><span class="qa-message-what"></span><span
                                                            class="qa-message-when"><span class="qa-message-when-data">Oct 24, 2013</span></span><span
                                                            class="qa-message-who"><span
                                                            class="qa-message-who-pad">by </span><span
                                                            class="qa-message-who-data"></span><a
                                                            href="#">muboy</a></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="qa-message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Phasellus fermentum iaculis mi, non dapibus nulla eleifend
                                            sed. Etiam ac commodo leo.<br/>Donec non sem id tellus mattis convallis.
                                            Morbi dapibus nulla ac dui lacinia,
                                        </div>
                                    </div>
                                </div>
                                <div id="m1" class="message-item green">
                                    <div class="message-inner">
                                        <div class="message-head clearfix">
                                            <div class="avatar pull-left"><a href="#"><img
                                                    src="" alt="image"/></a>
                                            </div>
                                            <div class="user-detail"><h5 class="handle">muboy</h5>

                                                <div class="post-meta">
                                                    <div class="asker-meta"><span class="qa-message-what"></span><span
                                                            class="qa-message-when"><span class="qa-message-when-data">Oct 24, 2013</span></span><span
                                                            class="qa-message-who"><span
                                                            class="qa-message-who-pad">by </span><span
                                                            class="qa-message-who-data"></span><a
                                                            href="#">muboy</a></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="qa-message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Phasellus fermentum iaculis mi, non dapibus nulla eleifend
                                            sed. Etiam ac commodo leo.<br/>Donec non sem id tellus mattis convallis.
                                            Morbi dapibus nulla ac dui lacinia,
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div id="tab-edit" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="tab-content">
                                        <div id="tab-profile-setting" class="tab-pane fade in active">
                                            <form action="#" class="form-horizontal">
                                                <div class="form-group"><label
                                                        class="col-sm-3 control-label">First Name</label>

                                                    <div class="col-sm-9 controls"><input type="text"
                                                                                          placeholder="first name"
                                                                                          class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label
                                                        class="col-sm-3 control-label">Last Name</label>

                                                    <div class="col-sm-9 controls"><input type="text"
                                                                                          placeholder="last name"
                                                                                          class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label
                                                        class="col-sm-3 control-label">Gender</label>

                                                    <div class="col-sm-9 controls">
                                                        <div class="radio-list"><label class="radio-inline"><input
                                                                type="radio" value="0" name="gender"
                                                                checked="checked"/>&nbsp;
                                                            Male</label><label class="radio-inline"><input
                                                                type="radio" value="1" name="gender"/>&nbsp;
                                                            Female</label></div>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label
                                                        class="col-sm-3 control-label">Birthday</label>

                                                    <div class="col-sm-9 controls">
                                                        <div class="row">
                                                            <div class="col-xs-6">
                                                                <input type="text" data-date-format="mm-dd-yyyy"
                                                                         placeholder="mm-dd-yyyy"
                                                                         class="datepicker-default form-control"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label
                                                        class="col-sm-3 control-label">Mobile Phone</label>

                                                    <div class="col-sm-9 controls"><input type="text"
                                                                                          placeholder="0-123-456-789"
                                                                                          class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label
                                                        class="col-sm-3 control-label">Permanent address</label>

                                                    <div class="col-sm-9 controls"><input type="text"
                                                                                          placeholder="first name"
                                                                                          class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label
                                                        class="col-sm-3 control-label">Present address</label>

                                                    <div class="col-sm-9 controls"><input type="text"
                                                                                          placeholder="first name"
                                                                                          class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
								                    <label for="SettingInputSkill" class="col-sm-3 control-label">Skills</label>

								                    <div class="col-sm-9">
								                        <div id="tags">
								                        <input data-skill="html" class="input form-control" id="SettingInputSkill" type="text" value="" placeholder="Add a skill" />
								                      </div>
								                    </div>
								                 </div>
                                                <div class="form-group"><label
                                                        class="col-sm-3 control-label">Marital
                                                    Status</label>

                                                    <div class="col-sm-9 controls">
                                                        <div class="row">
                                                            <div class="col-xs-6"><select
                                                                    class="form-control">
                                                                <option>Single</option>
                                                                <option>Married</option>
                                                            </select></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label
                                                        class="col-sm-3 control-label">About</label>

                                                    <div class="col-sm-9 controls"><textarea rows="3"
                                                                                             class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group mbn"><label
                                                        class="col-sm-3 control-label"></label>

                                                    <div class="col-sm-9 controls">
                                                        <button type="submit" class="btn btn-success"><i
                                                                class="fa fa-save"></i>&nbsp;
                                                            Save
                                                        </button>
                                                        &nbsp; &nbsp;<a href="#" class="btn btn-default">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="tab-account-setting" class="tab-pane fade">
                                            <form action="#" class="form-horizontal">
                                                <div class="form-body">
                                                    <div class="form-group"><label
                                                            class="col-sm-3 control-label">Email</label>

                                                        <div class="col-sm-9 controls"><input type="email"
                                                                                              placeholder="email@yourcompany.com"
                                                                                              class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><label
                                                            class="col-sm-3 control-label">Username</label>

                                                        <div class="col-sm-9 controls"><input type="text"
                                                                                              placeholder="username"
                                                                                              class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><label
                                                            class="col-sm-3 control-label">Password</label>

                                                        <div class="col-sm-9 controls">
                                                            <div class="row">
                                                                <div class="col-xs-6"><input type="password"
                                                                                             placeholder=""
                                                                                             class="form-control"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><label
                                                            class="col-sm-3 control-label">Confirm
                                                        Password</label>

                                                        <div class="col-sm-9 controls">
                                                            <div class="row">
                                                                <div class="col-xs-6"><input type="password"
                                                                                             placeholder=""
                                                                                             class="form-control"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mbn"><label
                                                            class="col-sm-3 control-label"></label>

                                                        <div class="col-sm-9 controls">
                                                            <button type="submit" class="btn btn-success"><i
                                                                    class="fa fa-save"></i>&nbsp;
                                                                Save
                                                            </button>
                                                            &nbsp; &nbsp;<a href="#"
                                                                            class="btn btn-default">Cancel</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="tab-contact-setting" class="tab-pane fade">
                                            <form action="#" class="form-horizontal">
                                                <div class="form-group"><label
                                                        class="col-sm-3 control-label">Bank name</label>

                                                    <div class="col-sm-9 controls"><input type="text"
                                                                                          placeholder="0-123-456-789"
                                                                                          class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label
                                                        class="col-sm-3 control-label">Bank account name</label>

                                                    <div class="col-sm-9 controls"><input type="text"
                                                                                          placeholder="http://website.com"
                                                                                          class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label
                                                        class="col-sm-3 control-label">Insurance code</label>

                                                    <div class="col-sm-9 controls"><input type="text"
                                                                                          placeholder=""
                                                                                          class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label
                                                        class="col-sm-3 control-label">Tax code</label>

                                                    <div class="col-sm-9 controls"><input type="text"
                                                                                          placeholder=""
                                                                                          class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="form-group mbn"><label
                                                        class="col-sm-3 control-label"></label>

                                                    <div class="col-sm-9 controls">
                                                        <button type="submit" class="btn btn-success"><i
                                                                class="fa fa-save"></i>&nbsp;
                                                            Save
                                                        </button>
                                                        &nbsp; &nbsp;<a href="#" class="btn btn-default">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="tab-emergency-setting" class="tab-pane fade">
                                            <form action="#" class="form-horizontal">
                                                <div class="form-group"><label
                                                        class="col-sm-3 control-label">Name</label>

                                                    <div class="col-sm-9 controls"><input type="text"
                                                                                          placeholder="binh"
                                                                                          class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label
                                                        class="col-sm-3 control-label">Address</label>

                                                    <div class="col-sm-9 controls"><input type="text"
                                                                                          placeholder="http://website.com"
                                                                                          class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label
                                                        class="col-sm-3 control-label">Relationship</label>

                                                    <div class="col-sm-9 controls"><input type="text"
                                                                                          placeholder=""
                                                                                          class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label
                                                        class="col-sm-3 control-label">Phone Number</label>

                                                    <div class="col-sm-9 controls"><input type="text"
                                                                                          placeholder=""
                                                                                          class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="form-group mbn"><label
                                                        class="col-sm-3 control-label"></label>

                                                    <div class="col-sm-9 controls">
                                                        <button type="submit" class="btn btn-success"><i
                                                                class="fa fa-save"></i>&nbsp;
                                                            Save
                                                        </button>
                                                        &nbsp; &nbsp;<a href="#" class="btn btn-default">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="active"><a href="#tab-profile-setting" data-toggle="tab"><i
                                                class="fa fa-folder-open"></i>&nbsp;
                                            Profile Setting</a></li>
                                        <li><a href="#tab-account-setting" data-toggle="tab"><i
                                                class="fa fa-cogs"></i>&nbsp;
                                            Account Setting</a></li>
                                        <li><a href="#tab-contact-setting" data-toggle="tab"><i
                                                class="fa fa-envelope-o"></i>&nbsp;
                                            Banking Setting</a></li>
                                        <li><a href="#tab-emergency-setting" data-toggle="tab"><i
                                                class="fa fa-phone"></i>&nbsp;
                                            Emergency Setting</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection