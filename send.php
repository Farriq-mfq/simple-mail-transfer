<?php 
	if (!isset($_SESSION['attch'])) {
		$dir  = 'attch/';
	foreach (glob($dir.'*.*') as $f) {
		unlink($f);

	}
	}

?>
<div class="blank">
	<div class="grid-form1">
		<div class="tab-pane active" id="horizontal-form">
			<div class="col-lg">
				<div class="tab__smtp">
					<div class="col" style="display: flex; justify-content: space-between; align-items: center;">
						<h5>Your SMTP</h5>
						<div class="read__smtp">
							<span style="font-size: 15px"></span>
						</div>
						<div>
							<button class="btn btn-info add__smtp"  style="border-radius: 50%"><i class="fa fa-plus"></i></button>
						</div>				
					</div>
				</div>
			</div>
			<div class="col-lg hide" id="form__add__SMTP">
				<form id="form__SMTP">
				<div class="respon__alert__smtp">

				</div>
					<div class="form-group">
						<label>Host</label>
						<input type="text" name="SMTP__host" class="form-control" value="<?= $_SESSION['host__smtp'] ?>" required>
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="SMTP__user" class="form-control" value="<?= $_SESSION['username__smtp'] ?>" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="SMTP__pass" value="<?= $_SESSION['pass__smtp'] ?>" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Port</label>
						<input type="number" name="SMTP__port" class="form-control" value="<?= $_SESSION['port__smtp'] ?>" required>
					</div>
					<div class="form-group">
						<button class="btn btn-success btn__sub__smtp" type="submit">Save</button>
						<button class="btn btn-danger" type="reset">Reset</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="grid-form1">
		<div class="col">
			<div class="tab__setform" style="display: flex;justify-content: space-between;">
				<h5>Recipients</h5>
				<span class="name__set__from" style="font-size: 15px"></span>
				<button class="btn btn-info add__recipients"  style="border-radius: 50%"><i class="fa fa-plus"></i></button>
			</div>
		</div>
		<div class="col hide" id="form__recipients">
			<div class="respon__alert__recep">
			</div>
			<form id="form_recipients">
				<div class="form-group">
				<label>Set From Name : </label>
				<input type="text" name="setfrom__name" class="form-control" value="<?= $_SESSION['setfrom__name']  ?>" required/>
				</div>
				<div class="form-group">
					<label>Set From Email : </label>
					<input type="email" name="setfrom__email" class="form-control" value="<?= $_SESSION['setfrom__email'] ?>" required/>
				</div>
				<div class="form-group">
					<label>Add Replay To : (optional)</label>
					<input type="email" name="replay" class="form-control" value="<?= $_SESSION['replay'] ?>">
				</div>
				<div class="form-group">
					<label>Information Replay : (optional)</label>
					<input type="text" name="information__replay" value="<?= $_SESSION['information__replay'] ?>" class="form-control">
				</div>
				<div class="form-group">
					<button class="btn btn-info btn__sub__recep" type="submit">Save</button>
					<button class="btn btn-danger" type="reset">Reset</button>
				</div>
			</form>
		</div>
	</div>
	<div class="grid-form1">
		<div class="col-lg">
			<div class="tab__attachment">
				<div class="col" style="display: flex; justify-content: space-between; align-items: center;">
					<h5>Attachment</h5>
					<div id="read__attch" style="display: inline-block;">
						

					</div>
					<div>
						<button class="btn btn-info add__attchment"  style="border-radius: 50%"><i class="fa fa-plus"></i></button>
					</div>				
				</div>
			</div>
		</div>
		<div class="col-lg hide" id="attachment__col">
			<form id="attachment" method="post">
				<div class="progress" style="display: none;">
	              <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
	            </div>
				<div class="form-group" id="append__attch">
	            <input type="file" name="attch" id="attch" class="form-control" required>
					<div style="display: flex;justify-content: space-between;margin-bottom: 10px">

					</div>
				</div>
				<div class="form-group">
					<button class="btn btn-primary" id="btn__attch">Save</button>
					<button class="btn btn-danger" id="btn__attch__cencel" style="display: none;">Cencel</button>
				</div>
			</form>
		</div>
	</div>
	<div class="grid-form1">
         <div class="tab-content">
				<div class="tab-pane active" id="horizontal-form">
					<form class="form-horizontal" id="send__">
						<div class="form-group">
							<div class="col-sm-6">
								<label>Subject</label>
								<input type="text" name="subject" class="form-control" placeholder="Subject in here" required/>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6" style="padding-bottom: 20px">
								<div class="col-sm-6">
									<label>Email List : </label><span class="loaded__list"></span>
								</div>
								<div class="col-sm-6">
									<div class="form-group" style="display: flex;justify-content: space-between; align-items: center;position: relative;">
										<input type="file" name="" id="upload_txt" class="lorem">
										<label for="upload_txt" class="btn-1" data-title='XLS'><i class="fa fa-upload" class="upload_icon"></i> </label>
										<input type="file" name="" id="upload_txt" class="lorem">
										<label for="upload_txt" style="background: #ee6d9e" class="btn-1" data-title='TXT'><i class="fa fa-upload" class="upload_icon"></i> </label>
										<button class="btn__generate" type="button"><i class="fa fa-gear"></i></button>
									</div>
								</div>
								<textarea class="form-control" name="mail__list" id="mail__list" cols="10" rows="15" required/></textarea>
								<br>
								<div class="loader__sending hide" style="width: 100%; display: flex;margin: auto;justify-content: center; align-items: center;">
									Sending...
										<i class="fa fa-send sending__animate" ></i>
								</div>
								<div class="respon__suc_fail_per" style="display:none; transition: 1s">
									<div class="info__" style="display: flex; justify-content: space-between;">
										<div class="grid-graph">
									<div class="grid-graph1">
									<div id="os-Win-lbl">Success <span></span></div>
									<div id="os-Mac-lbl">Total <span> </span></div>
									<div id="os-Other-lbl">Error	<span></span></div>
								 </div>
								 </div>
										<canvas id="pie" height="200" width="200" style="width: 470px; height: 315px;"></canvas>
									</div>
								</div>
								<div class="getmail">
									<p>mail success</p>
								</div>
							</div>
							<div class="col-md-6" style="padding-bottom: 20px">
								<div class="tab__message col-lg" style="display: flex; justify-content: space-around;">
									<h4 style="padding-right:100px ">Message </h4>
									<div class="form-group" style="display: flex;box-sizing: border-box;">
										<label class="btn__upload__mes" for="import"><i class="fa fa-upload"></i></label><input type="file" name="" class="import" id="import">
									</div>
								</div>
								<textarea class="form-control" id="message__type" name="message__type" cols="10" rows="15" required/></textarea>
								<button style="width: 100%;margin-top: 5px;" id="btn__preview" type="button" class="btn btn-warning">Preview</button>
								<br>
								<div id="preview" class="hide" style="border: 1px solid rgba(0,0,0,0.2);">

								</div>
								<br>
								<button class="btn btn-info btn__send" style="width: 100%;border-radius: 5px; transition: 1s">
									Send <i class="fa fa-send "></i>
								</button>
								<button class="btn btn-danger btn__stop hide" style="width: 50%;;border-radius: 5px;position: absolute;margin: 0 -2px;">
									Stop <i class="fa fa-close "></i>
								</button>
							</div>
						</div>
					</form>
				</div>
		</div>
	</div>
</div>
