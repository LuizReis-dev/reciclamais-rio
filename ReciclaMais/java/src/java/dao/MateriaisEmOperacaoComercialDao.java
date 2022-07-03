package dao;

import entidades.MateriaisEmOperacaoComercial;
import java.sql.Connection;
import java.sql.PreparedStatement;

public class MateriaisEmOperacaoComercialDao {
    
    public static int inserirMaterialEmCompra(MateriaisEmOperacaoComercial materialEmOp){
       int status = 0;  
   try{
        Connection con = ConnectionDao.getConnection();
        PreparedStatement ps = (PreparedStatement) con.prepareStatement("INSERT INTO materias_em_op(id_operacao_comercial,id_material,total_em_kg) VALUES(?,'?',?)");
        ps.setInt(1, materialEmOp.getOperacaoComercial().getId());
        ps.setInt(2, materialEmOp.getMaterial().getId());
        ps.setDouble(3, materialEmOp.getQuantidadeEmKg());
        status = ps.executeUpdate();
    }catch(Exception erro){
        System.out.println(erro);
    }      
       return status;
   }
}
