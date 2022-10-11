package entidades;

public class OperacaoComercial {

    private int id;
    private Catador catador;
    private Empresa empresa;
    private char tipo;
    private double total_sugerido;
    private double total_final;
    private Funcionario funcionario;
    
    public OperacaoComercial() {
    }

    public OperacaoComercial(int id, Catador catador, Empresa empresa, char tipo, double total_sugerido, double total_final, Funcionario funcionario) {
        this.id = id;
        this.catador = catador;
        this.empresa = empresa;
        this.tipo = tipo;
        this.total_sugerido = total_sugerido;
        this.total_final = total_final;
        this.funcionario = funcionario;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public Catador getCatador() {
        return catador;
    }

    public void setCatador(Catador catador) {
        this.catador = catador;
    }

    public Empresa getEmpresa() {
        return empresa;
    }

    public void setEmpresa(Empresa empresa) {
        this.empresa = empresa;
    }

    public char getTipo() {
        return tipo;
    }

    public void setTipo(char tipo) {
        this.tipo = tipo;
    }

    public double getTotal_sugerido() {
        return total_sugerido;
    }

    public void setTotal_sugerido(double total_sugerido) {
        this.total_sugerido = total_sugerido;
    }

    public double getTotal_final() {
        return total_final;
    }

    public void setTotal_final(double total_final) {
        this.total_final = total_final;
    }
    public Funcionario getFuncionario() {
        return funcionario;
    }

    public void setFuncionario(Funcionario funcionario) {
        this.funcionario = funcionario;
    }
    
    
}