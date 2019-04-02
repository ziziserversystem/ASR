<?php

namespace iJoshuaHD\iMCPE\ASR;

use pocketmine\Player;
use pocketmine\IPlayer;

use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;

use pocketmine\utils\TextFormat;

class Commands implements CommandExecutor{

	public function __construct(Loader $plugin){
		$this->plugin = $plugin;
	}
	
	public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
		switch(strtolower($command->getName())){
		
			case "asr":
				if(isset($args[0])){
					if(!is_numeric($args[0])){
						$sender->sendMessage("§a【運営】 §c数字で指定してください");
					}
					if($args[0] > 60){
						$sender->sendMessage("§a【運営】 §c60より大きい値は設定できません");
					}
					$this->plugin->setValueTimer($args[0]);
					$sender->sendMessage("§a【運営】 §f再起動の時間を設定しました " . $args[0] . " min/s. 次の再起動で採用されます");
				}else{
					$sender->sendMessage("Usage: /asr <value>");
				}
			break;
			return true; 
		
			case "restart":
				$time = $this->plugin->getTimer();
				$sender->sendMessage("§a［運営］ §f再起動まで 残り{$time}分");
			break;
			return true; 
		
		}
	return true; 
		
		
	}

}
