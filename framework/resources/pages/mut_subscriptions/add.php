<?php
/**
 * Created by IntelliJ IDEA.
 * User: online2
 * Date: 02/03/2018
 * Time: 18:02
 */

?>

<form name="post" action="" id="post">
						<div id="poststuff"> <div id="post-body" class="metabox-holder columns-2">

								<div id="post-body-content">
									<div id="titlediv">
										<div id="titlewrap">
											<label class="screen-reader-text" id="title-prompt-text" for="title">Enter title here</label>
											<input type="text" name="post_title" size="30" value="Something's title" id="title" autocomplete="off">
										</div>
									</div><!-- /titlediv -->
								</div><!-- /post-body-content -->

								<div id="postbox-container-1" class="postbox-container">
									<div id="side-sortables" class="meta-box-sortables ui-sortable">

										<!-- METABOX -->
										<div id="submitdiv" class="postbox">
											<h3 class="hndle"><span>Metabox title</span></h3>
											<div class="inside">
												<div class="submitbox" id="submitpost">
													<div id="minor-publishing">
														<div style="display:none;">
															<p class="submit"><input type="submit" name="save" id="save" class="button" value="Save"></p>
														</div>
														<div id="minor-publishing-actions">
															<div id="save-action">
																<input type="submit" name="save" id="save-post" value="Save Draft" class="button">
															</div>
															<div class="clear"></div>
														</div><!-- #minor-publishing-actions -->
														<div id="misc-publishing-actions">
															<div class="misc-pub-section misc-pub-post-status">
																<label for="post_status">Status:</label> <span id="post-status-display">Draft</span> <a href="#post_status" class="edit-post-status hide-if-no-js">Edit</a>
																<div id="post-status-select" class="hide-if-js">
																	<input type="hidden" name="hidden_post_status" id="hidden_post_status" value="draft">
																	<select name="post_status" id="post_status">
																		<option value="pending">Pending Review</option>
																		<option selected="selected" value="draft">Draft</option>
																	</select>
																	<a href="#post_status" class="save-post-status hide-if-no-js button">OK</a> <a href="#post_status" class="cancel-post-status hide-if-no-js button-cancel">Cancel</a>
																</div>
															</div><!-- .misc-pub-section -->
															<div class="misc-pub-section misc-pub-visibility" id="visibility">
																Visibility: <span id="post-visibility-display">Public</span> <a href="#visibility" class="edit-visibility hide-if-no-js">Edit</a>
																<div id="post-visibility-select" class="hide-if-js">
																	<input type="hidden" name="hidden_post_password" id="hidden-post-password" value=""> <input type="hidden" name="hidden_post_visibility" id="hidden-post-visibility" value="public"> <input type="radio" name="visibility" id="visibility-radio-public" value="public" checked="checked"> <label for="visibility-radio-public" class="selectit">Public</label><br>
																	<input type="radio" name="visibility" id="visibility-radio-password" value="password"> <label for="visibility-radio-password" class="selectit">Password protected</label><br>
																	<span id="password-span"><label for="post_password">Password:</label> <input type="text" name="post_password" id="post_password" value="" maxlength="20"><br></span> <input type="radio" name="visibility" id="visibility-radio-private" value="private"> <label for="visibility-radio-private" class="selectit">Private</label><br>
																	<p> <a href="#visibility" class="save-post-visibility hide-if-no-js button">OK</a> <a href="#visibility" class="cancel-post-visibility hide-if-no-js button-cancel">Cancel</a> </p>
																</div>
															</div><!-- .misc-pub-section -->
															<div class="misc-pub-section curtime misc-pub-curtime">
																<span id="timestamp">Publish on: <b>Mar 6, 2014 @ 13:58</b></span> <a href="#edit_timestamp" class="edit-timestamp hide-if-no-js">Edit</a>
																<div id="timestampdiv" class="hide-if-js">
																	<div class="timestamp-wrap">
																		<select id="mm" name="mm">
																			<option value="03" selected="selected"> 03-Mar </option>
																		</select> <input type="text" id="jj" name="jj" value="06" size="2" maxlength="2" autocomplete="off">, <input type="text" id="aa" name="aa" value="2014" size="4" maxlength="4" autocomplete="off"> @ <input type="text" id="hh" name="hh" value="13" size="2" maxlength="2" autocomplete="off"> : <input type="text" id="mn" name="mn" value="58" size="2" maxlength="2" autocomplete="off">
																	</div><input type="hidden" id="ss" name="ss" value="41">
																	<p> <a href="#edit_timestamp" class="save-timestamp hide-if-no-js button">OK</a> <a href="#edit_timestamp" class="cancel-timestamp hide-if-no-js button-cancel">Cancel</a> </p>
																</div>
															</div>
														</div>
														<div class="clear"></div>
													</div>
													<div id="major-publishing-actions">
														<div id="delete-action">
															<a class="submitdelete deletion" href="">Move to Trash</a>
														</div>
														<div id="publishing-action">
															<input name="original_publish" type="hidden" id="original_publish" value="Save"> <input type="submit" name="publish" id="publish" class="button button-primary button-large" value="Save" accesskey="p">
														</div>
														<div class="clear"></div>
													</div>
												</div>
											</div>
										</div>

										<!-- METABOX -->
										<div id="postimagediv" class="postbox ">
											<div class="handlediv" title="Click to toggle"><br></div><h3 class="hndle"><span>Featured Image</span></h3>
											<div class="inside">
												<p ><a title="Set featured image" href="" id="set-post-thumbnail" class="thickbox">Set featured image</a></p>
											</div>
										</div>

									</div>
								</div>
								<!-- /SIDEBAR -->


								<!-- --------------------------------------------------- -->
								<!--                    MAIN AREA                        -->
								<!-- --------------------------------------------------- -->


								<div id="postbox-container-2" class="postbox-container">
									<div id="normal-sortables" class="meta-box-sortables ui-sortable">
										<div id="" class="postbox">
											<h3 class="hndle"> <span>Metabox</span> </h3>
											<div class="inside">
												<select name="" id="">
													<option value="">Sample selectbox</option>
													<option value="">Sample</option>
												</select>
												<button id="" class="button button-primary button-large">Button</button>
											</div>
										</div>


										<div id="" class="postbox">
											<h3 class="hndle"> <span>Another Metabox</span> </h3>
											<div class="inside">
												Add something here
											</div>
										</div>
									</div>
								</div>
								<!-- /MAIN -->









							</div><!-- /post-body --> <br class="clear"> </div><!-- /poststuff -->
					</form>


