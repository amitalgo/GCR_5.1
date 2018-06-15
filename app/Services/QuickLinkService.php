<?php
/**
 * Created by PhpStorm.
 * User: MyPc
 * Date: 14/02/2018
 * Time: 12:55 PM
 */

namespace App\Services;


interface QuickLinkService
{
	public function getAllQuickLinks();

	public function getQuickLink($id);

	public function getAllActiveQuickLink();

	public function getQuickLinkByPage($pageId);

	public function saveQuickLink($data);

	public function updateQuickLink($data, $id);

}