<?php

declare(strict_types=1);

namespace RobertoFretel\TestPlugin;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use pocketmine\inventory\BaseInventory;
use pocketmine\utils\TextFormat;

class Main extends PluginBase{
	public function onEnable() {
		$this->getLogger()->info(TextFormat::GREEN . 'Test Abilitato!');
	}
	
	public function onCommand(CommandSender $sender, Command $command, $label, array $args):bool {
		
		$pretest = TextFormat::GREEN . '[TestPlugin]' . TextFormat::RESET;
		
		if($command->getName() === 'test') {
			
			if(!$sender instanceof Player) {
				
				$sender->sendMessage("$pretest please use this command in-game..");
				
			}else{
				if(!$sender->getAllowFlight()) {
				
					$sender->setAllowFlight(true);
					$sender->sendMessage("$pretest Volaaa!");
					$sender->getInventory()->addItem(Item::get(268,0,1));
					
				} else {
				
					$sender->setAllowFlight(false);
					$sender->setFlying(false);
					$sender->sendMessage("$pretest Cadi ahaha");
					$sender->getInventory()->removeItem(Item::get(268,0,1));
					
				}
			} 
			
			return false;
		}
		
	}
	
	public function onDisable() {
		$this->getLogger()->info(TextFormat::RED . 'Test Disabilitato');
	}
}
?>