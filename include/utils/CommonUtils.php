<?php
/* * *******************************************************************************
 * The contents of this file are subject to the SugarCRM Public License Version 1.1.2
 * ("License"); You may not use this file except in compliance with the
 * License. You may obtain a copy of the License at http://www.sugarcrm.com/SPL
 * Software distributed under the License is distributed on an  "AS IS"  basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License for
 * the specific language governing rights and limitations under the License.
 * The Original Code is:  SugarCRM Open Source
 * The Initial Developer of the Original Code is SugarCRM, Inc.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.;
 * All Rights Reserved.
 * Contributor(s): ______________________________________.
 * ****************************************************************************** */
/* * *******************************************************************************
 * $Header$
 * Description:  Includes generic helper functions used throughout the application.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 * ****************************************************************************** */

require_once('include/utils/utils.php'); //new
require_once('include/utils/RecurringType.php');
require_once 'include/QueryGenerator/QueryGenerator.php';
require_once 'include/ListView/ListViewController.php';
require_once 'include/runtime/Cache.php';



/** This function returns the conversion rate and vtiger_currency symbol
 * in array format for a given id.
 * param $id - vtiger_currency id.
 */
function getCurrencySymbolandCRate($id)
{
	return vtlib\Functions::getCurrencySymbolandRate($id);
}

/** This function returns the terms and condition from the database.
 * Takes no param and the return type is text.
 */
function getTermsandConditions()
{
	return vtlib\Functions::getInventoryTermsAndCondition();
}

/** This function returns a string with removed new line character, single quote, and back slash double quoute.
 * param $str - string to be converted.
 */
function br2nl($str)
{
	return vtlib\Functions::br2nl($str);
}

/**
 * This function is used to get the blockid of the customblock for a given module.
 * Takes the input parameter as $tabid - module tabid and $label - custom label
 * This returns string type value
 */
function getBlockId($tabid, $label)
{
	return vtlib\Deprecated::getBlockId($tabid, $label);
}

function getEntityName($module, $ids, $compute = true)
{
	if ($module == 'Users' || $module == 'Groups') {
		return \includes\fields\Owner::getLabel($ids);
	} elseif ($compute) {
		return \includes\Record::computeLabels($module, $ids);
	} else {
		return \includes\Record::getLabel($ids);
	}
}

/**
 * 	This function is used to decide the File Storage Path in where we will upload the file in the server.
 * 	return string $filepath  - filepath inwhere the file should be stored in the server will be return
 */
function decideFilePath($module = false)
{
	return vtlib\Functions::initStorageFileDirectory($module);
}

/**
 * 	This function is used to get the Email Template Details like subject and content for particular template.
 * 	@param integer $templateid  - Template Id for an Email Template
 * 	return array $returndata - Returns Subject, Body of Template of the the particular email template.
 */
function getTemplateDetails($templateid)
{
	return vtlib\Deprecated::getTemplateDetails($templateid);
}

/** 	Function used to retrieve a single field value from database
 * 	@param string $tablename - tablename from which we will retrieve the field value
 * 	@param string $fieldname - fieldname to which we want to get the value from database
 * 	@param string $idname	 - idname which is the name of the entity id in the table like, inoviceid, etc.,
 * 	@param int    $id	 - entity id
 * 	return string $fieldval  - field value of the needed fieldname from database will be returned
 */
function getSingleFieldValue($tablename, $fieldname, $idname, $id)
{
	return vtlib\Functions::getSingleFieldValue($tablename, $fieldname, $idname, $id);
}

/**
 *  Function to get recurring info depending on the recurring type
 *  return  $recurObj       - Object of class RecurringType
 */
function getrecurringObjValue()
{
	return vtlib\Functions::getRecurringObjValue();
}

function getTranslatedString($str, $module = 'Vtiger')
{
	return vtlib\Functions::getTranslatedString($str, $module);
}

/**
 * Get translated currency name string.
 * @param String $str - input currency name
 * @return String $str - translated currency name
 */
function getTranslatedCurrencyString($str)
{
	return vtlib\Deprecated::getTranslatedCurrencyString($str);
}

function getTicketComments($ticketid)
{
	return vtlib\Functions::getTicketComments($ticketid);
}

function makeRandomPassword()
{
	return vtlib\Functions::generateRandomPassword();
}

/**
 * This function is used to get cvid of default "all" view for any module.
 * @return a cvid of a module
 */
function getCvIdOfAll($module)
{
	return vtlib\Deprecated::getIdOfCustomViewByNameAll($module);
}

/** gives the option  to display  the tagclouds or not for the current user
 * * @param $id -- user id:: Type integer
 * * @returns true or false in $tag_cloud_view
 * * Added to provide User based Tagcloud
 * */
function getTagCloudView($id = "")
{
	return vtlib\Functions::getTagCloudView($id);
}

/** Stores the option in database to display  the tagclouds or not for the current user
 * * @param $id -- user id:: Type integer
 * * Added to provide User based Tagcloud
 * */
function SaveTagCloudView($id = "")
{
	return vtlib\Deprecated::SaveTagCloudView($id);
}

/**     function used to change the Type of Data for advanced filters in custom view and Reports
 * *     @param string $table_name - tablename value from field table
 * *     @param string $column_nametable_name - columnname value from field table
 * *     @param string $type_of_data - current type of data of the field. It is to return the same TypeofData
 * *            if the  field is not matched with the $new_field_details array.
 * *     return string $type_of_data - If the string matched with the $new_field_details array then the Changed
 * *	       typeofdata will return, else the same typeofdata will return.
 * *
 * *     EXAMPLE: If you have a field entry like this:
 * *
 * * 		fieldlabel         | typeofdata | tablename            | columnname       |
 * *	        -------------------+------------+----------------------+------------------+
 * *		Potential Name     | I~O        | vtiger_quotes        | potentialid      |
 * *
 * *     Then put an entry in $new_field_details  like this:
 * *
 * *				"vtiger_quotes:potentialid"=>"V",
 * *
 * *	Now in customview and report's advance filter this field's criteria will be show like string.
 * *
 * */
function ChangeTypeOfData_Filter($table_name, $column_name, $type_of_data)
{
	return vtlib\Functions::transformFieldTypeOfData($table_name, $column_name, $type_of_data);
}

/** Clear the Smarty cache files(in Smarty/smarty_c)
 * * This function will called after migration.
 * */
function clear_smarty_cache($path = null)
{
	vtlib\Deprecated::clearSmartyCompiledFiles($path);
}

/** Get Smarty compiled file for the specified template filename.
 * * @param $template_file Template filename for which the compiled file has to be returned.
 * * @return Compiled file for the specified template file.
 * */
function get_smarty_compiled_file($template_file, $path = null)
{
	return vtlib\Deprecated::getSmartyCompiledTemplateFile($template_file, $path);
}

/** Function to carry out all the necessary actions after migration */
function perform_post_migration_activities()
{
	vtlib\Deprecated::postApplicationMigrationTasks();
}

/** Function to get picklist values for the given field that are accessible for the given role.
 *  @ param $tablename picklist fieldname.
 *  It gets the picklist values for the given fieldname
 *  	$fldVal = Array(0=>value,1=>value1,-------------,n=>valuen)
 *  @return Array of picklist values accessible by the user.
 */
function getPickListValues($tablename, $roleid)
{
	return vtlib\Functions::getPickListValuesFromTableForRole($tablename, $roleid);
}

/** Function to check the file access is made within web root directory and whether it is not from unsafe directories */
function checkFileAccessForInclusion($filepath)
{
	vtlib\Deprecated::checkFileAccessForInclusion($filepath);
}

/** Function to check the file deletion within the deletable (safe) directories */
function checkFileAccessForDeletion($filepath)
{
	vtlib\Deprecated::checkFileAccessForDeletion($filepath);
}

/** Function to check the file access is made within web root directory. */
function checkFileAccess($filepath)
{
	vtlib\Deprecated::checkFileAccess($filepath);
}

/**
 * function to return whether the file access is made within vtiger root directory
 * and it exists.
 * @param String $filepath relative path to the file which need to be verified
 * @return Boolean true if file is a valid file within vtiger root directory, false otherwise.
 */
function isFileAccessible($filepath)
{
	return vtlib\Deprecated::isFileAccessible($filepath);
}

/** Function to get the ActivityType for the given entity id
 *  @param entityid : Type Integer
 *  return the activity type for the given id
 */
function getActivityType($id)
{
	return vtlib\Functions::getActivityType($id);
}

/** Function to get owner name either user or group */
function getOwnerName($id)
{
	return vtlib\Functions::getOwnerRecordLabel($id);
}

/**
 * This function is used to get the blockid of the settings block for a given label.
 * @param $label - settings label
 * @return string type value
 */
function getSettingsBlockId($label)
{
	return vtlib\Deprecated::getSettingsBlockId($label);
}

/**
 * this function returns the entity field name for a given module; for e.g. for Contacts module it return concat(lastname, ' ', firstname)
 * @param string $module - the module name
 * @return string $fieldsname - the entity field name for the module
 */
function getEntityField($module)
{
	return vtlib\Functions::getEntityModuleSQLColumnString($module);
}

/**
 * this function returns the entity field name for a given module; for e.g. for Contacts module it return concat(lastname, ' ', firstname)
 * @param1 $module - name of the module
 * @param2 $fieldsName - fieldname with respect to module (ex : 'Accounts' - 'accountname', 'Contacts' - 'lastname','firstname')
 * @param3 $fieldValues - array of fieldname and its value
 * @return string $fieldConcatName - the entity field name for the module
 */
function getEntityFieldNameDisplay($module, $fieldsName, $fieldValues)
{
	return vtlib\Deprecated::getCurrentUserEntityFieldNameDisplay($module, $fieldsName, $fieldValues);
}
// vtiger cache utility
require_once('include/utils/VTCacheUtils.php');

// vtlib customization: Extended vtiger CRM utlitiy functions
require_once('include/utils/VtlibUtils.php');

// END

function vt_suppressHTMLTags($string)
{
	return vtlib\Functions::suppressHTMLTags($string);
}

function getSqlForNameInDisplayFormat($input, $module, $glue = ' ')
{
	return vtlib\Deprecated::getSqlForNameInDisplayFormat($input, $module, $glue);
}

function decimalFormat($value)
{
	return vtlib\Functions::formatDecimal($value);
}

function get_group_options()
{
	return vtlib\Functions::get_group_options();
}
